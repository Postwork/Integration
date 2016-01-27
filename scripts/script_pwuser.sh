#!/bin/bash
# $1 1:Ajout 2:Supression
# $2 Identifiant - Nom de Machine
# $3 Mot de passe


source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

sudo script_user.sh $1 $2 $3
sudo script_bdd.sh $1 $2 $3
# sudo script_mail.sh $1 $2 $3
sudo script_chat.sh $1 $2 $3
# script_pwhost.sh $1 $2 $2