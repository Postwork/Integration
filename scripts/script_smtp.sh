#!/bin/bash
# $1 1:Ajout 2:Supression 3:Activer SMTP 4:Desactiver SMTP
# $2 Utilisateur 

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

cd /etc/postfix/
test=`sudo cat vmailbox | grep $2`
case $1 in
	1 )
		if [[ -z $test ]]; then
			sudo bash -c "echo '$2@$dname $2/' >> vmailbox"
			sudo mkdir $mail$2
			sudo chmod 700 $mail$2
			sudo chown vmail:vmail $mail$2
		else
			exit 1
		fi	
	;;
	2 )
		if [[ -n $test ]]; then
			sudo sed -i -e "/^$2@$dname /d" vmailbox
			sudo rm -R $mail$2
		else
			exit 1
		fi	
	;;
	3 )
		if [[ -z $test ]]; then
			sudo bash -c "echo '$2@$dname $2/' >> vmailbox"
		else
			exit 1
		fi	
	;;
	4 )
		if [[ -n $test ]]; then
			sudo sed -i -e "/^$2@$dname /d" vmailbox
		else
			exit 1
		fi	
	;;
esac
sudo postmap vmailbox
sudo postfix reload
