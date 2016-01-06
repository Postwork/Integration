<?php
session_start();
require 'fonction.php';
switch ($_POST['formulaire']) {
	case 'création':
	if (!is_null($_POST['nom']) and !ip2long($_POST['ip'])) {
		fCreerfqdn($_POST['nom'], $globals['ippostwork']);
	} elseif (!is_null($_POST['nom']) and ip2long($_POST['ip'])) {
		fCreerfqdn($_POST['nom'], $_POST['ip']);
	}
	break;
	case 'activation':
	fVhost($_POST['statussite']);
	break;
	case 'bdd':
	echo $_POST['formulaire'];
	// fSupprimersite($_POST['site']);
	break;
	case 'suppression':
	echo $_POST['formulaire'];
	// fBdd($_POST['statusbdd']);
	break;
		// default:
		// echo "string2";
		// break;
}

// echo $_POST['formulaire'];
// if ($_POST['formulaire'] == 'création') {
// 	if (!is_null($_POST['nom']) and !ip2long($_POST['ip'])) {
// 		fCreerfqdn($_POST['nom'], $globals['ippostwork']);
// 	} elseif (!is_null($_POST['nom']) and ip2long($_POST['ip'])) {
// 		fCreerfqdn($_POST['nom'], $_POST['ip']);
// 	}
// } elseif ($_POST['formulaire'] == 'activation') {
// 	fVhost($_POST['statussite']);
// } elseif ($_POST['formulaire'] == 'bdd') {
// 	fBdd($_POST['statusbdd']);
// } elseif ($_POST['formulaire'] == 'suppression') {
// 	echo "string";
// 	fSupprimersite();
// }


$liste = fAffichersiteutilisateur();
foreach ($liste as $key => $value) {
	if ($value['Portfolio'] == 0 and $value['IP'] == $globals['ippostwork']) {
		$projet[] = $value;
	} elseif ($value['Portfolio'] == 1) {
		$portfolio[] = $value;
	} elseif ($value['IP'] != $globals['ippostwork']) {
		$fqdn[] = $value;
	}
}
?>