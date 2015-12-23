<?php
	// $bdd = new PDO('mysql:host=localhost;dbname=postwork', 'postwork', 'postwork');
	// $requete = $bdd->query('SELECT * from Utilisateur where idUtilisateur = 2');
	// $resultat = $requete->fetch();
	// echo $requete['idUtilisateur'].' : '.$requete['prenom'].' '. $requete['dateNaissance'];
if (isset($_POST['envoyer'])) {

	require('source.php');
	// $bdd = new PDO('mysql:host=localhost;dbname=postwork', 'postwork', 'BxGw4J9pmyQFT8G4');
	$pseudo=htmlspecialchars($_POST['pseudo']);
	$nom=htmlspecialchars($_POST['nom']);
	$prenom=htmlspecialchars($_POST['prenom']);
	$datenaissance=htmlspecialchars($_POST['datenaissance']);
	$motdepasse=htmlspecialchars($_POST['motdepasse']);
	$motdepasse2=htmlspecialchars($_POST['motdepasse2']);
	
	$requete = $bdd->query('SELECT IdUtilsateur from Utilisateur where Pseudo=?');
	$requete->execute(array($pseudo));
	$resultat = $requete->fetch();
	if (isset($resultat)) {
		# code...
	}
	if ($motdepasse == $motdepasse2) {
		$motdepassehash = password_hash($motdepasse, PASSWORD_DEFAULT);
		
		$reqInscription = $bdd->query('INSERT INTO postwork.utilisateur(Pseudo, Nom, Prenom, DateNaissance, MotDePasse)VALUES(?, ?, ?, ?, ?)');
		echo "ok,";
		$reqInscription->execute(array($pseudo,$nom,$prenom,$datenaissance,$motdepassehash));
		echo "ok1,";
		$resultat = $reqInscription->fetch();
		echo "ok3";

	// header("Location: ?page=index");

		echo $datenaissance;
	} else {
		# code...
	}
}

?>