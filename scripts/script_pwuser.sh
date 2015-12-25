#!/bin/bash
# $1 1:Ajout 2:Supression
# $2 Identifiant - Nom de Machine
# $3 Mot de passe


source /var/www/postwork/postwork.itinet.fr/scripts/source.sh

script_user.sh $1 $2 $3
#script_bdd.sh $1 $2 $3 $2
script_mail.sh $1 $2 $3
script_chat.sh $1 $2 $3
<<<<<<< HEAD
script_pwhost.sh $1 $2 $2
=======
script_pwhost.sh $1 $2 $2 $2
>>>>>>> b42a78479ce4667685d0f3d05da2842e42620270
