<?php
if (isset($_POST['envoyer'])) {

	require('source.php');
	$pseudo=htmlspecialchars($_POST['pseudo']);
	#$pwd=sha1($_POST['pwd']);
	# le mot de passeest en claire dans la bdd
	$pwd=htmlspecialchars($_POST['pwd']);

	
	$reqConnexion = $bdd->prepare('SELECT * FROM utilisateur WHERE Pseudo=? AND MotDePasse=?');		//Initialisation de la requete
	$reqConnexion->execute(array($pseudo,$pwd));	//Execution de la requete
	$resultat = $reqConnexion->fetch();		//Stock le resultat de la requte dans un array

	if ($resultat) {
		session_start();
		$_SESSION['idUtilisateur']=$resultat['idUtilisateur'];
		$_SESSION['Prenom']=$resultat['Prenom'];
		header("Location: ?page=index");	//redirection vers index
	}
}
?>