#!/bin/bash
# $1 1:Ajout 2:Supression
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
                        CREATE USER "$2"@"localhost" IDENTIFIED BY '$3';
                        CREATE DATABASE $2;
                        GRANT CREATE,DROP,SELECT,INSERT,DELETE,UPDATE ON $2.* TO "$2"@"localhost" ;
                        FLUSH PRIVILEGES ;"
                else
                        exit 1
                fi
        ;;
        2)

                if [[ -n $nom ]];
                then
                        mysql -u $mysql_login -p$mysql_pass -e "
                        DROP USER "$2"@"localhost" ;
                        DROP DATABASE $2 ;
                        FLUSH PRIVILEGES ;"
                else
                        exit 1
                fi
        ;;
esac
