#!/bin/bash
# $1 1:Ajout 2:Supression
# $2 Utilisateur
# $3 Documentroot ou FQDN

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

case $1 in
	1 )
		sudo mkdir $www$2/$3
		sudo chmod 755 $www$2/$3
		sudo chown $2:www-data $www$2/$3
	;;
	2 )
		sudo rm -R $www$2/$3
	;;
esac