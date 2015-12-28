<?php
if (isset($_POST['envoyer'])) {
	require 'fonction.php';
	fConnexion($_POST['pseudo'], $_POST['motdepasse']);
	header("Location: ?page=index");	//redirection vers index
}
?>
