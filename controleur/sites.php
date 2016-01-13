<?php
if (isset($_SESSION['IdUtilisateur'])) {
	include(dirname(__FILE__).'/../modele/mSites.php');
	include(dirname(__FILE__).'/../vue/vSites.php');
} else {
	header("Location: ?page=index");
	exit;
}