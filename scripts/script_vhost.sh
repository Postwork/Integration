#!/bin/bash
# $1 1:Ajout 2:Supression 3:Activation Vhost 4:Désactivation Vhost
# $2 Nom de Machine
# $3 Documentroot

source /var/www/postwork/scripts/source.sh

case $1 in
	1 )
		sudo bash -c "echo -E 'server {
        listen 80;

        root $www$3/;
        index index.php index.html index.htm;

        server_name $2$fqdn;

        #access_log /var/log/nginx/$2$fqdn.access.log;
        #error_log /var/log/nginx/$2$fqdn.error.log;

        location / {
                try_files \$uri \$uri/ =404;
        }

        location ~ \.php$ {
               include snippets/fastcgi-php.conf;
               fastcgi_pass unix:/var/run/php5-fpm.sock;
        }
        }' > /etc/nginx/sites-available/$2$fqdn"
		sudo ln -s /etc/nginx/sites-available/$2$fqdn /etc/nginx/sites-enabled/
	;;
	2 )
		if [[ -f /etc/nginx/sites-available/$2$fqdn ]]; then
			sudo rm /etc/nginx/sites-available/$2$fqdn | sudo rm /etc/nginx/sites-enabled/$2$fqdn
		else
			exit 1
		fi
	;;
	3 )
		sudo ln -s /etc/nginx/sites-available/$2$fqdn /etc/nginx/sites-enabled/
	;;
	4 )
		sudo rm /etc/nginx/sites-enabled/$2$fqdn
	;;
esac
sudo nginx -s reload
