#!/bin/bash
# $1 1:Ajout 2:Supression 3:Changer mot de passe
# $2 Identifiant
# $3 Mot de passe

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

case $1 in
	1 )
		if [[ -n $3 ]]; then
			sudo useradd -d $mail$2 -s /usr/bin/mysecureshell -p $(openssl passwd -1 $3) $2
			if [[ $? -eq 0 ]]; then
			sudo edquota -p freddy $2
			sudo mkdir $www$2
			sudo chmod 755 $www$2
			sudo chown $2:www-data $www$2
			fi
		else
			exit 1
		fi
	;;
	2 )
		sudo userdel $2
		sudo rm -R $www$2
		sudo rm -R $mail$2
		sudo rm -R /var/cloud/$2
	;;
	3 )
		if [[ -n $3 ]]; then
		sudo echo "$2:$3" | sudo chpasswd
		else
			exit 1
		fi
esac
