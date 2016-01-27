<?php
session_start();
require 'fonction.php';
$fqdn = htmlentities(substr(fSite('FQDN'), 0, -19));
$ip = htmlentities(fSite('IP'));
$idcat = fSite('IdCategorie');
$description = htmlentities(fSite('Description'));
if (isset($_POST['envoyer']) === true) {
	switch ($_POST['formulaire']) {
		case 'fqdn':
		fModifierfqdn($_POST['fqdn']);
		break;
		case 'ip'	:
		fModifierip($_POST['ip']);
		break;
		case 'description':
		fModifierdescription($_POST['description']);
		break;
		case 'categorie':
		fModifiercategorie($_POST['categorie']);
		break;
		// case 'tagger':
		// fTagger($_POST['idtag']);
		// break;
		case 'detagger':
		fDetagger($_POST['idtag']);
		break;
		case 'tag':
		fTagger2($_POST['tag']);
		// $id = fCreertag($_POST['tag']);
		// if ($id > 0) {
		// 	fTagger($id);
		// } else {
		// 	$_SESSION['erreur'] = "Erreur ce tag existe déjà.";
		// }
		break;
		
		default:
			# code...
		break;
	}
}

$fqdn = htmlentities(substr(fSite('FQDN'), 0, -19));
$ip = htmlentities(fSite('IP'));
$idcat = fSite('IdCategorie');
$description = htmlentities(fSite('Description'));