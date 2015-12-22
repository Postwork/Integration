#!/bin/bash
# $1 1:Ajout 2:Supression 3:Activation Vhost 4:Désactivation Vhost
# $2 Utilisateur
# $3 Nom de Machine

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

case $1 in
	1 )
		sudo bash -c "echo -E 'server {
        listen 80;

        root $www$2/$3$fqdn;
        index index.php index.html index.htm;

        server_name $3$fqdn;

        #access_log /var/log/nginx/$3$fqdn.access.log;
        #error_log /var/log/nginx/$3$fqdn.error.log;

        location / {
                try_files \$uri \$uri/ =404;
        }

        location ~ \.php$ {
               include snippets/fastcgi-php.conf;
               fastcgi_pass unix:/var/run/php5-fpm.sock;
        }
        }' > /etc/nginx/sites-available/$3$fqdn"
		sudo ln -s /etc/nginx/sites-available/$3$fqdn /etc/nginx/sites-enabled/
	;;
	2 )
		if [[ -f /etc/nginx/sites-available/$3$fqdn ]]; then
			sudo rm /etc/nginx/sites-available/$3$fqdn | sudo rm /etc/nginx/sites-enabled/$3$fqdn
		else
			exit 1
		fi
	;;
	3 )
		if [[ -f /etc/nginx/sites-available/$3$fqdn ]]; then
			sudo ln -s /etc/nginx/sites-available/$3$fqdn /etc/nginx/sites-enabled/
		else
			exit 1
		fi
	;;
	4 )
		if [[ -f /etc/nginx/sites-enabled/$3$fqdn ]]; then
			sudo rm /etc/nginx/sites-enabled/$3$fqdn
		else
			exit 1
		fi
	;;
esac
sudo nginx -s reload