#!/bin/bash
# $1 1:Ajout 2:Supression 3:Changer mot de passe
# $2 Identifiant
# $3 Mot de passe

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

case $1 in
        1 ) sudo prosody_adduser.sh $2@$dname $3 ;;
        2 ) sudo prosodyctl deluser $2@$dname ;;
	  3 ) sudo prosody_changepwd.sh $2@$dname $3 ;;
esac
