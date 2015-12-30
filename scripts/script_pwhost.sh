#!/bin/bash
# $1 1:Ajout 2:Supression
# $2 Utilisateur
# $3 Nom de machine
# $4 IP Public (optionnel)

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

script_vhost.sh $1 $2 $3
script_fqdn.sh $1 $3 $4
script_documentroot $1 $2 $3
script_base $1 $2 $3
if [[ $1 = 1 ]]; then
	script_qrcode.sh 1 $2 $3
fi
