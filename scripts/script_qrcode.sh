#!/bin/bash
# $1 Où stocker le QRcode 1 3:Documentroot 2 4:Envoi par mail
# $2 Utilisateur 
# $3 FQDN
source /var/www/postwork/scripts/source.sh

case $1 in
	1 )
		sudo qrencode "$3$fqdn" -o $www$2/$3$fqdn.png
		sudo chown $2:www-data $www$2/$3$fqdn.png
	;;
	2 )
		sudo qrencode "$3$fqdn" -o $3$fqdn.png
		mail -r noreply@$dname -s "QRcode" -A $3$fqdn.png $2@$dname <<< 'Vous trouverez ci-joint votre QRcode. Cordialement, PwTeam'
		sudo rm $3$fqdn.png
	;;
        3 )
                sudo qrencode "$3" -o $www$2/$3.png
                sudo chown $2:www-data $www$2/$3.png
        ;;
        4 )
		sudo qrencode "$3" -o $3.png
                mail -r noreply@$dname -s "QRcode" -A $3.png $2@$dname <<< 'Vous trouverez ci-joint votre QRcode. Cordialement, PwTeam'
		sudo rm $3.png
        ;;

esac
