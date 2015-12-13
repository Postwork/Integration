#!/bin/bash
# $1 1:Ajout 2:Supression
# $2 Utilisateur 
# $3 mot de passe

source /var/www/postwork/scripts/source.sh

script_smtp.sh $1 $2
script_imap.sh $1 $2 $3
