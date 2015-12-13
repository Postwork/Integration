#!/bin/bash
# $1 Identifiant
source /var/www/postwork/postwork.itinet.fr/scripts/source.sh
sudo prosodyctl adduser $1
echo OK
