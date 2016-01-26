<?php
require 'fonction.php';
if (isset($_POST['envoyer'])) {
	$mdpcmp = strcmp($_POST['motdepasse'], $_POST['motdepasse2']);
	if ( $mdpcmp === 0) {
		$signin = fInscription($_POST['pseudo'], $_POST['motdepasse']);
		if ( $signin > 0) {
			header("Location: ?page=connexion");
		} else {
		$_SESSION['erreur'] = $signin;
		}
	} else {
		$_SESSION['erreur'] = "Erreur Mots de passe différents.";
	}
}