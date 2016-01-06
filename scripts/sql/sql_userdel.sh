#!/bin/bash
# $1 idUtilisateur

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

requete=$(mysql -u $postwork_login -p$postwork_pass -e "SELECT idUtilisateur FROM postwork.utilisateur WHERE idUtilisateur='$1';")
nom=`echo $requete | awk '{ print $1}'`

if [[ -z $nom ]];
then
	mysql -u $postwork_login -p$postwork_pass -e "
	DELETE 
	FROM `postwork`.`utilisateur` 
	WHERE `utilisateur`.`idUtilisateur` = $1"
else
	exit 1
fi