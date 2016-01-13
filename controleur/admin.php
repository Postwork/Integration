<?php
if (isset($_SESSION['IdUtilisateur']) and $_SESSION['IdUtilisateur'] == -10) {
	include(dirname(__FILE__).'/../modele/mAdmin.php');
	include(dirname(__FILE__).'/../vue/vAdmin.php');
} else {
	header("Location: ?page=index");
	exit;
}
