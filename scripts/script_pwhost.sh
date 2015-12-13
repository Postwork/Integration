#!/bin/bash
# $1 1:Ajout 2:Supression
# $2 Utilisateur
# $3 Nom de machine
# $4 Documentroot
# $5 IP Public (optionnel)

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

script_vhost.sh $1 $3 $4
script_fqdn.sh $1 $3 $5
if [[ $1 = 1 ]]; then
	script_qrcode.sh 1 $2 $3
fi
