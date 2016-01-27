<?php
session_start();
require 'fonction.php';

switch ($_POST['formulaire']) {
	case '2':
	if (empty($_POST["motdepasse"]) === false and fConnexion(fUtilisateur("Pseudo"), $_POST['motdepasse'])) {
		if ($_POST["nouveau"] == $_POST["nouveau2"]) {
			$_SESSION['erreur'] = fChangermotdepasse($_POST["motdepasse"], $_POST["nouveau"]);
		} else {
			$_SESSION['erreur'] = "Le nouveau mot de passe et la confirmation sont différents.";
		}
	} else {
		$_SESSION['erreur'] = "Erreur ancien mot de passe.";
	}
	break;
	case 'email':
	if (empty($_POST["email"]) ===false) {
		fChangermail($_POST["email"]);
	} else {
		$_SESSION['erreur']  = "Erreur adresse email vide.";
	}
	break;
	case '4':
	if (empty($_POST["motdepasse"]) === false ) {
		$_SESSION['erreur']  = fDesinscription($_POST["motdepasse"]);
	} else {
		$_SESSION['erreur']  = "Erreur mot de passe vide.";
	}
	break;
	case 'prenom':
	if (empty($_POST["prenom"]) ===false) {
		fChangerprenom($_POST["prenom"]);
	} else {
		$_SESSION['erreur']  = "Erreur prenom vide.";
	}
	break;
	case 'nom':
	if (empty($_POST["nom"]) ===false) {
		fChangernom($_POST["nom"]);
	} else {
		$_SESSION['erreur']  = "Erreur nom vide.";
	}
	break;
	case 'datedenaissance':
	if (empty($_POST["datedenaissance"]) ===false) {
		$date = strftime("%F", strtotime($_POST["datedenaissance"]));
		fChangerdatenaissance($date);
	} else {
		$_SESSION['erreur']  = "Erreur date de naissance vide.";
	}
	break;
}

if (!is_null(fUtilisateur("Nom"))) {
	$ok = 1;
	$parametre = fParametreutilisateur();
	$nom = $parametre["Nom"];
	$prenom = $parametre["Prenom"];
	$datedenaissance = strftime("%d/%m/%Y", strtotime($parametre["DateNaissance"]));
	$email = $parametre["EmailExt"];
}
?>