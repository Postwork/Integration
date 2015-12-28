<?php
if (isset($_POST['envoyer'])) {
	require 'fonction.php';
	if ($motdepasse === $motdepasse2) {
		fInscription($_POST['pseudo'], $_POST['motdepasse']);
		header("Location: ?page=connexion");
	}
}
?>
