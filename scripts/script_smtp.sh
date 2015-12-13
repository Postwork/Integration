#!/bin/bash
# $1 1:Ajout 2:Supression
# $2 Utilisateur 

source /var/www/postwork/scripts/source.sh

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
esac
sudo postmap vmailbox
sudo postfix reload
