<?php
if (isset($_POST['envoyer'])) {

	require 'source.php';
	$pseudo=htmlspecialchars($_POST['pseudo']);
	$motdepasse=htmlspecialchars($_POST['motdepasse']);

	$reqConnexion = $bdd->prepare('SELECT * FROM utilisateur WHERE Pseudo=?');		//Initialisation de la requete
	$reqConnexion->execute(array($pseudo));	//Execution de la requete
	$resultat = $reqConnexion->fetch();		//Stock le resultat de la requte dans un array

	if (password_verify($motdepasse, $resultat['MotDePasse'])) {	//Vérification du mot de passe
		session_start();
		$_SESSION['IdUtilisateur']=$resultat['IdUtilisateur'];
		$_SESSION['Prenom']=$resultat['Prenom'];
		$_SESSION['Pseudo']=$resultat['Pseudo'];
		header("Location: ?page=index");	//redirection vers index
	} else {
		echo 'Mot de passe invalide.';
	}
}
?>
