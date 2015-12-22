#!/bin/bash

source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

while :
 do
 	echo "Bienvenue Sur le script master de Postwork.
 	1: Tchat
 	2: Base de données
 	3: FQDN
 	4: Mail
 	5: Qrcode
 	6: Vhost
 	7: Ajouter un utilisateur avec toutes les options
 	8: Ajouter un site à un utilisateur
 	9: Creer un utilisateur
	0: Sortir	"
 	cmd=$PPID

 	read cmd
 	case $cmd in
 		0 )
			break
		;;

		1 )	
			read -p "Taper 1 pour creer 2 pour supprimer " var1
			read -p "Nom d'utilisateur: " var2
			if [[ $var1 = 1 ]]; then
        			read -s -p "Mot de passe: " var3     
			fi
			script_chat.sh $var1 $var2 $var3
 		;;

		2)
			read -p "Tapez 1 pour creer 2 pour supprimer " var1
			read -p "Nom d'utilisateur: " var2
                        if [[ $var1 = 1 ]]; then
                                read -s -p "Mot de passe: " var3
                        fi
            read -p "Nom de la base à créer: " var4
			script_bdd.sh $var1 $var2 $var3 $var4
		;;

		3)
			read -p "Tapez 1 pour creer 2 pour supprimer " var1
			read -p "Nom d'utilisateur (ou nom de machine): " var2
			read -p "Ip Public (facultatif): " var3
			script_fqdn.sh $var1 $var2 $var3
		;;

		4)
			read -p "Tapez 1 pour creer 2 pour supprimer " var1
			read -p "Nom d'utilisateur: " var2
                        if [[ $var1 = 1 ]]; then
                                read -s -p "Mot de passe: " var3
                        fi
			script_mail.sh $var1 $var2 $var3
		;;

		5)
			read -p "Tapez ou stocker le QRcode 1 pour documentroot, 2 pour envoi par mail " var1
			read -p "Nom d'utilisateur: " var2
			read -p "Nom de Machine: " var3
			script_qrcode.sh $var1 $var2 $var3
		;;

		6)
			read -p "Tapez 1 pour creer, 2 pour supprimer, 3 pour activer, 4 pour desactiver " var1
			read -p "Nom de machine: " var2
                        if [[ $var1 = 1 ]]; then
                                read -p "Documentroot: " var3
                        fi
			script_vhost.sh $var1 $var2 $var3
		;;

		7)
			read -p "Tapez 1 pour creer, 2 pour supprimer " var1
			read -p "Identifiant/nom de machine: " var2
                        if [[ $var1 = 1 ]]; then
                                read -s -p "Mot de passe: " var3
                        fi
			script_pwuser.sh $var1 $var2 $var3
		;;

		8)
			read -p "Tapez 1 pour creer, 2 pour supprimer" var1
			read -p "Nom d'utilisateur: " var2
                        if [[ $var1 = 1 ]]; then
				read -p "Nom de machine: " var3
				read -p "Documentroot: " var4
				read -p "IP publique (optionnelle): " var5
                        fi
			script_pwhost.sh $var1 $var2 $var3 $var4 $var5
		;;

		9)
			read -p "Tapez 1 pour creer, 2 pour supprimer " var1
                        read -p "Identifiant/nom de machine: " var2
                        if [[ $var1 = 1 ]]; then
                      	read -s -p "Mot de passe:" var3
                        fi
			script_user.sh $var1 $var2
		;;
 	esac
done
