<?php
	session_start();
	require 'fonction.php';
	$fqdn = htmlentities(substr(fSite('FQDN'), 0, -19));
	$ip = htmlentities(fSite('IP'));
	$idcat = fSite('IdCategorie');
	$description = htmlentities(fSite('Description'));

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
		case 'tagger':
			fTagger($_POST['idtag']);
			break;
		case 'detagger':
			fDetagger($_POST['idtag']);
			break;
		case 'tag':
			fTagger(fCreertag($_POST['tag']));
			break;
		
		default:
			# code...
			break;
	}

	$fqdn = htmlentities(substr(fSite('FQDN'), 0, -19));
	$ip = htmlentities(fSite('IP'));
	$idcat = fSite('IdCategorie');
	$description = htmlentities(fSite('Description'));
?>