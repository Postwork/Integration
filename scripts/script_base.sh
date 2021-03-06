#!/bin/bash
# $1 1:Ajout 2:Supression
# $2 Utilisateur
# $3 Nom de la base

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

requete=$(mysql -u $mysql_login -p$mysql_pass -e "SELECT user FROM mysql.user WHERE user='$2';")
nom=`echo $requete | awk '{ print $2}'`
case $1 in
  1)
  if [[ -n $nom ]];
  then
    mysql -u $mysql_login -p$mysql_pass -e "
    CREATE DATABASE $3 ;
    GRANT CREATE,DROP,SELECT,INSERT,DELETE,UPDATE ON $3.* TO "$2"@"localhost" ;
    FLUSH PRIVILEGES ;"
  else
    exit 1
  fi
  ;;
  2)
  if [[ -n $nom ]];
  then
    mysql -u $mysql_login -p$mysql_pass -e "
    DROP DATABASE $3 ;
    FLUSH PRIVILEGES ;"
  else
    exit 1
  fi
esac