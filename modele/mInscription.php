<?php
	// $bdd = new PDO('mysql:host=localhost;dbname=postwork', 'postwork', 'postwork');
	// $requete = $bdd->query('SELECT * from Utilisateur where idUtilisateur = 2');
	// $resultat = $requete->fetch();
	// echo $requete['idUtilisateur'].' : '.$requete['prenom'].' '. $requete['dateNaissance'];
if (isset($_POST['envoyer'])) {

	// require('source.php');
	$pseudo=htmlspecialchars($_POST['pseudo']);
	$nom=htmlspecialchars($_POST['nom']);
	$prenom=htmlspecialchars($_POST['prenom']);
	$datenaissance=htmlspecialchars($_POST['datenaissance']);
	$motdepasse=htmlspecialchars($_POST['motdepasse']);
	$motdepasse2=htmlspecialchars($_POST['motdepasse2']);

	$requete='truc_sql.sh '.$pseudo.' '.$nom.' '.$prenom.' '.$datenaissance.' '.$motdepasse;
	// exec($requete);
	echo $requete;
	
}

?>