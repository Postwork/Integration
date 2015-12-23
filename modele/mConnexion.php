<?php
if (isset($_POST['envoyer'])) {

	require('source.php');
	$pseudo=htmlspecialchars($_POST['pseudo']);
	$motdepasse=htmlspecialchars($_POST['motdepasse']);

	
	$reqConnexion = $bdd->prepare('SELECT * FROM utilisateur WHERE Pseudo=?');		//Initialisation de la requete
	$reqConnexion->execute(array($pseudo));	//Execution de la requete
	$resultat = $reqConnexion->fetch();		//Stock le resultat de la requte dans un array
	

	if (password_verify($motdepasse, $resultat['MotDePasse'])) {
		session_start();
		$_SESSION['IdUtilisateur']=$resultat['IdUtilisateur'];
		$_SESSION['Prenom']=$resultat['Prenom'];
		header("Location: ?page=index");	//redirection vers index
	} else {
		echo 'Le mot de passe est invalide.';
	}
}
?>