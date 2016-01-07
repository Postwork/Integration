<?php
session_start();
if (isset($_SESSION['IdUtilisateur'])) {
	session_destroy();
}
if (isset($_POST['envoyer'])) {
	require 'fonction.php';
	if (fConnexion($_POST['pseudo'], $_POST['motdepasse']) > 0) {
	header("Location: ?page=index");	//redirection vers index
	 } else {
	 	header("Location: ?page=connexion");
	 }
}
?>
