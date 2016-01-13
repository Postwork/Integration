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
		if (!filter_var($_POST['ip'], FILTER_VALIDATE_IP, FILTER_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
			fModifierip($_POST['ip']);
		} else {
			$_SESSION['erreur'] = "Erreur adresse IP invalide.";
		}
		break;
		case 'description':
		fModifierdescription($_POST['description']);
		break;
		case 'categorie':
		fModifiercategorie($_POST['categorie']);
		break;
		case 'tagger':
		fTagger($_POST['idtag']);
		break;
		case 'detagger':
		fDetagger($_POST['idtag']);
		break;
		case 'tag':
		if ($id = fCreertag($_POST['tag']) > 0) {
			fTagger($id);
		} else {
			$_SESSION['erreur'] = "Erreur ce tag existe déjà.";
		}
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