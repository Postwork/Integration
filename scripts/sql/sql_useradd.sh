#!/bin/bash
# $1 Pseudo
# $2 Nom 
# $3 Prenom
# $4 Date de naissance format US
# $5 Mot de passe

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

requete=$(mysql -u $postwork_login -p$postwork_pass -e "SELECT Pseudo FROM postwork.utilisateur WHERE Pseudo='$1';")
nom=`echo $requete | awk '{ print $1}'`

if [[ -z $nom ]];
then
	mysql -u $postwork_login -p$postwork_pass -e "
	INSERT INTO `postwork`.`utilisateur` (`Pseudo`, `Nom`, `Prenom`, `DateNaissance`, `MotDePasse`) 
	VALUES ('$1', '$2', '$3', '$4', '$5');"
else
	exit 1
fi