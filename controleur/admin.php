<?php
if (isset($_SESSION['IdUtilisateur'])) {
	if (fUtilisateur("Admin") == 2015) {
	include(dirname(__FILE__).'/../modele/mAdmin.php');
	include(dirname(__FILE__).'/../vue/vAdmin.php');
	}
} else {
	header("Location: ?page=index");
	exit;
}
