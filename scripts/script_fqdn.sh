#!/bin/bash
# $1 1:Ajout 2:Supression
# $2 Utilisateur ou Nom de machine
# $3 IP Public (optionnel)

source /var/www/postwork/scripts/source.sh

cd /etc/tinydns/root/
url=$2$fqdn

if [[ $url != $fqdn ]]; then
	test=`sudo cat data | grep $url`
	case $1 in
		1 )
			if [[ -z $test ]]; then
				if [[ -n $3 ]]; then
					sudo bash -c "echo '=$url:$3' >> data"
				else
					sudo bash -c "echo '=$url:$ip' >> data"
				fi
			else
				exit 1
			fi	
		;;
		2 )
			if [[ -n $test ]]; then
				sudo sed -i '/'"$url"'/d' data
			else
				exit 1
			fi
		;;
	esac
	sudo make
	sudo ssh -i /home/freddy/.ssh/id_rsa root@dedibox.itinet.fr
fi
