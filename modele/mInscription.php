<?php
if (isset($_POST['envoyer'])) {
	require 'fonction.php';
	if ($motdepasse === $motdepasse2) {
		if (fInscription($_POST['pseudo'], $_POST['motdepasse']) > 0) {
			header("Location: ?page=connexion");
		} else {
			header("Location: ?page=inscription");
		}
	}
}
?>
