<?php
if (isset($_SESSION['IdUtilisateur'])) {
	include(dirname(__FILE__).'/../modele/mModifier.php');
	include(dirname(__FILE__).'/../vue/vModifier.php');
} else {
	header("Location: ?page=index");
	exit;
}