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
					$erreur  = "Erreur adresse email.";
				}
			} else {
				$erreur  = "Erreur date de niassance.";
			}
		} else {
			$erreur  = "Erreur nom.";
		}
	} else {
		$erreur  = "Erreur prenom.";
	}
} elseif ($_POST["formulaire"] == 2) {
	if (empty($_POST["motdepasse"]) ===false) {
		if ($_POST["nouveau"] == $_POST["nouveau2"]) {
			$erreur = fChangermotdepasse($_POST["motdepasse"], $_POST["nouveau"]);
		} else {
			$erreur = "Le nouveau mot de passe et la confirmation sont différents.";
		}
	} else {
		$erreur = "Erreur ancien mot de passe.";
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