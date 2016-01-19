<?php
session_start();
require 'fonction.php';
if (isset($_SESSION['IdUtilisateur'])) {
	session_destroy();
}
if (isset($_POST['envoyer'])) {
	if (fConnexion($_POST['pseudo'], $_POST['motdepasse']) > 0) {
	header("Location: ?page=sites");	//redirection vers index
} else {
	header("Location: ?page=connexion");
}
}