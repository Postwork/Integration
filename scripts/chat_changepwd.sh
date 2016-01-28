#!/bin/bash
# $1 Identifiant
source /var/www/postwork/postwork.itinet.fr/scripts/source.sh
sudo prosodyctl passwd $1
echo OK
