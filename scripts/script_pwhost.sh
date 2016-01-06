#!/bin/bash
# $1 1:Ajout 2:Supression
# $2 Utilisateur
# $3 Nom de machine
# $4 IP Public (optionnel)

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh
sudo script_vhost.sh $1 $2 $3
sudo script_fqdn.sh $1 $3 $4
sudo script_documentroot.sh $1 $2 $3
sudo script_base.sh $1 $2 $3
if [[ $1 = 1 ]]; then
	sudo script_qrcode.sh 1 $2 $3
fi
