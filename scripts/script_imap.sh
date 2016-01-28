#!/bin/bash
# $1 1:Ajout 2:Supression 3:Activer IMAP 4:Desactiver IMAP 5:changer mot de passe
# $2 Utilisateur 
# $3 mot de passe

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

cd /etc/courier/
test=`sudo cat userdb | grep "/$2|"`  
case $1 in
	1)
		if [[ -z $test ]];
		then
			sudo userdb $2 set imappw=$(openssl passwd -1 $3) uid=5000 gid=5000 home=$mail$2 mail=$mail$2 options=disableimap=0
			mail -r noreply@$dname -s "Bienvenue" $2@$dname <<< 'Merci de nous avoir rejoint sur Postwork. Cordialement, PwTeam'
		else
			exit 1
		fi
	;;
	2)
		if [[ -n $test ]];
		then
			sudo sed -i -e "s&$test&&g" userdb
			sudo sed -i -e '/^$/d' userdb
		else
			exit 1
		fi
	;;
	3)
		if [[ -n $test ]];
		then
			nouveau1=`awk '{gsub("disableimap=1", "disableimap=0");print}' <<< $test`
			nouveau=$nouveau1 | tr ' ' '\t'
			sudo sed -i -e "s&$test&$nouveau&g" userdb
		else
			exit 1
		fi
		# if [[ -n $test ]];
		# then
		# 	nouveau=`awk '{gsub("#", "");print}' <<< $test`
		# 	sudo sed -i -e "s&$test&$nouveau&g" userdb
		# else
		# 	exit 1
		# fi
	;;
	4)
		if [[ -n $test ]];
		then
			nouveau1=`awk '{gsub("disableimap=0", "disableimap=1");print}' <<< $test`
			nouveau=$nouveau1 | tr ' ' '\t'
			sudo sed -i -e "s&$test&$nouveau&g" userdb
		else
			exit 1
		fi
		# if [[ -n $test ]];
		# then
		# 	sudo sed -i -e "s&$test&#$test&g" userdb
		# else
		# 	exit 1
		# fi
	;;
esac
sudo makeuserdb
