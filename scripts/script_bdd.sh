#!/bin/bash
# $1 1:Ajout 2:Supression 3:Changer de mot de passe
# $2 Utilisateur
# $3 mot de passe

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

requete=$(mysql -u $mysql_login -p$mysql_pass -e "SELECT user FROM mysql.user WHERE user='$2';")
nom=`echo $requete | awk '{ print $2}'`
case $1 in
  1)
  if [[ -z $nom ]];
  then
    mysql -u $mysql_login -p$mysql_pass -e "
    CREATE USER "$2"@"localhost" IDENTIFIED BY '$3';"
  else
    exit 1
  fi
  ;;
  2)
  if [[ -n $nom ]];
  then
    mysql -u $mysql_login -p$mysql_pass -e "
    DROP USER "$2"@"localhost";"
  else
    exit 1
  fi
  ;;
  3)
  if [[ -n $nom ]];
  then
    mysql -u $mysql_login -p$mysql_pass -e "
    SET PASSWORD FOR "$nom"@"localhost" = PASSWORD('$3');"
  else
    exit 1
  fi
  ;;
esac
