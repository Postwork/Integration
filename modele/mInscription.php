<?php
require 'fonction.php';
if (isset($_POST['envoyer'])) {
	if (!empty($_POST['pseudo'])) {
		if (!empty($_POST['motdepasse'])) {
			$mdpcmp = strcmp($_POST['motdepasse'], $_POST['motdepasse2']);
			if ( $mdpcmp === 0) {
				$signin = fInscription($_POST['pseudo'], $_POST['motdepasse']);
				if ( $signin > 0) {
					$_SESSION['inscription']=1;
					header("Location: ?page=connexion");
				} else {
					$_SESSION['erreur'] = $signin;
				}
			} else {
				$_SESSION['erreur'] = "Erreur Mots de passe différents.";
			}
		} else {
			$_SESSION['erreur'] = "Erreur Mot de passe vide.";
		}
	} else {
		$_SESSION['erreur'] = "Erreur Pseudo vide.";
	}
}