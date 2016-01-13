<?php
if (isset($_SESSION['IdUtilisateur'])) {
	include(dirname(__FILE__).'/../modele/mParametre.php');
	include(dirname(__FILE__).'/../vue/vParametre.php');
} else {
	header("Location: ?page=index");
	exit;
}
