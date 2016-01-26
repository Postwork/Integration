<?php
session_start();
require 'fonction.php';
if (isset($_SESSION['IdUtilisateur'])) {
	session_destroy();
}
if (isset($_POST['envoyer'])) {
	$connect = fConnexion($_POST['pseudo'], $_POST['motdepasse']);
	if ($connect > 0) {
	header("Location: ?page=sites");	//redirection vers index
} else {
	$_SESSION['erreur'] = $connect;
}
}