#!/bin/bash
# $1 FQDN
# $2 IP

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

requete=$(mysql -u $postwork_login -p$postwork_pass -e "SELECT Nom FROM postwork.fqdn WHERE Nom='$1';")
nom=`echo $requete | awk '{ print $1}'`

if [[ -z $nom ]];
then
	if [[ -z $2 ]]; 
	then
		mysql -u $postwork_login -p$postwork_pass -e "
		INSERT INTO `postwork`.`fqdn` (`Nom`) VALUES ('$1');"
	else
		mysql -u $postwork_login -p$postwork_pass -e "
		INSERT INTO `postwork`.`fqdn` (`Nom`, `IP`) VALUES ('$1', '$2');"
	fi
else
	exit 1
fi