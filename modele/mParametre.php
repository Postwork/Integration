<?php
session_start();
require 'fonction.php';


if ($_POST["formulaire"] == 1) {
	if (empty($_POST["prenom"]) ===false) {
		if (empty($_POST["nom"]) ===false) {
			if (empty($_POST["datedenaissance"]) ===false) {
				$date = strftime("%F", strtotime($_POST["datedenaissance"]));
				if (empty($_POST["email"]) ===false) {
					fParametre($_POST["prenom"], $_POST["nom"], $date, $_POST["email"]);
				} else {
					$_SESSION['erreur']  = "Erreur adresse email.";
				}
			} else {
				$_SESSION['erreur']  = "Erreur date de naissance.";
			}
		} else {
			$_SESSION['erreur']  = "Erreur nom.";
		}
	} else {
		$_SESSION['erreur']  = "Erreur prenom.";
	}
} elseif ($_POST["formulaire"] == 2) {
	if (empty($_POST["motdepasse"]) === false and fConnexion(fUtilisateur("Pseudo"), $_POST['motdepasse'])) {
		if ($_POST["nouveau"] == $_POST["nouveau2"]) {
			$_SESSION['erreur'] = fChangermotdepasse($_POST["motdepasse"], $_POST["nouveau"]);
		} else {
			$_SESSION['erreur'] = "Le nouveau mot de passe et la confirmation sont différents.";
		}
	} else {
		$_SESSION['erreur'] = "Erreur ancien mot de passe.";
	}
} elseif ($_POST["formulaire"] == 3) {
	if (empty($_POST["email"]) ===false) {
		fChangermail($_POST["email"]);
	} else {
		$_SESSION['erreur']  = "Erreur adresse email.";
	}
} elseif ($_POST["formulaire"] == 4) {
	if (empty($_POST["motdepasse"]) === false ) {
		fDesinscription($_POST["motdepasse"]);
	} else {
		$_SESSION['erreur']  = "Erreur mot de passe vide.";
	}
}

if (!is_null(fUtilisateur("Nom"))) {
	$ok = 1;
	$parametre = fParametreutilisateur();
	$nom = $parametre["Nom"];
	$prenom = $parametre["Prenom"];
	$datedenaissance = $parametre["DateNaissance"];
	$email = $parametre["EmailExt"];
}
?>