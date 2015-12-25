<?php
if (isset($_POST['envoyer'])) {

	require 'source.php';

	// Recuperation des variables
	$pseudo=htmlspecialchars($_POST['pseudo']);
	$motdepasse=htmlspecialchars($_POST['motdepasse']);
	$motdepasse2=htmlspecialchars($_POST['motdepasse2']);

	// Requete(s) SQL
	$requete = $bdd->prepare("SELECT Pseudo from utilisateur where Pseudo = ?");
	$requete->execute(array($pseudo));
	$resultat = $requete->fetch();

	// Operation(s)
	if (is_null($resultat['Pseudo'])) {
		if ($motdepasse == $motdepasse2) {

			$motdepassehash = password_hash($motdepasse, PASSWORD_DEFAULT);

			$reqInscription = $bdd->prepare('INSERT INTO postwork.utilisateur (Pseudo, MotDePasse) VALUES (?, ?)');
			$reqInscription->execute(array($pseudo, $motdepassehash));
			$resultat = $reqInscription->fetch();

			header("Location: ?page=index");

		} else {
			echo "Mots de passes differents.";
		}
	} else {
		echo "Pseudo indisponible : ".$resultat['Pseudo'].".";
	}

}

?>
