<?php
session_start();
require 'fonction.php';
switch ($_POST['formulaire']) {
	case 'mail':
	echo $_POST['statusmail'];
	fMail($_POST['statusmail']);
	break;
	case 'création':
	if (empty($_POST['nom']) === false) {
		if (isset($_POST['ip']) === true ) {
			fCreerfqdn($_POST['nom'], $_POST['ip']);
		} else {
			fCreerprojet($_POST['nom'], $globals['ippostwork']);
		}
	} else {
		$_SESSION['erreur']="Nom vide.";
	}
	break;
	case 'activation':
	fVhost($_POST['statussite']);
	break;
	case 'bdd':
	fBdd($_POST['statusbdd']);
	break;
	case 'suppression':
	fSupprimersite($_POST['site']);
	break;
}

$mail=fUtilisateur("StatusMail");
$pseudo=fUtilisateur("Pseudo");

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