<?php

require 'source.php';
// <---------------------------------------------------------------------->

function fAffichercategorie()
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->query('SELECT * FROM postwork.categorie');
	$resultat = $requete->fetchAll();
	return $resultat;
}

function fAffichertag()
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->query('SELECT * FROM postwork.tag');
	$resultat = $requete->fetchAll();
	return $resultat;
}

function fAffichertagsite()
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('SELECT tag.IdTag, tag.Nom AS Tag
		FROM site
		INNER JOIN categorie ON site.IdCategorie = categorie.IdCategorie
		INNER JOIN tagger ON site.IdSite = tagger.IdSite
		INNER JOIN tag ON tagger.IdTag = tag.IdTag
		WHERE site.IdSite =?');
	$requete->execute(array($_POST['envoyer']));
	$resultat = $requete->fetchAll();
	return $resultat;
}

function fAfficherutilisateur()
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->query('SELECT * FROM postwork.utilisateur');
	$resultat = $requete->fetchAll();
	return $resultat;
}

function fUtilisateur($champ)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('SELECT * FROM utilisateur WHERE IdUtilisateur=?');		//Initialisation de la requete
	$requete->execute(array($_SESSION['IdUtilisateur']));	//Execution de la requete
	$resultat = $requete->fetch();		//Stock le resultat de la requete dans un array
	return $resultat[$champ];
}

function fSite($champ)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('SELECT * FROM site WHERE IdSite=?');
	$requete->execute(array($_POST['envoyer']));
	$resultat = $requete->fetch();
	return $resultat[$champ];
}

function fCesite()
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('SELECT FQDN, IP, StatusVhost, StatusBDD, Description, site.IdCategorie AS IdCat, Nom AS Categorie FROM site INNER JOIN categorie ON site.IdCategorie = categorie.IdCategorie WHERE IdSite=?');
	$requete->execute(array($_POST['envoyer']));
	$resultat = $requete->fetch();
	return $resultat;
}

function fIdtag($nom)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('SELECT IdTag FROM tag WHERE Nom=?');
	$requete->execute(array($nom));
	$resultat = $requete->fetch();
	return $resultat['IdTag'];
}

function fIdcategorie($nom)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('SELECT IdCategorie FROM categorie WHERE Nom=?');
	$requete->execute(array($nom));
	$resultat = $requete->fetch();
	return $resultat['IdCategorie'];
}

function fIdsite($nom)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$nomfqdn = $nom.$globals['fqdnpostwork']; // nom de machine -> fqdn
	$requete = $bdd->prepare('SELECT IdSite FROM site WHERE FQDN=?');
	$requete->execute(array($nomfqdn));
	$resultat = $requete->fetch();
	return $resultat['IdSite'];
}

function fIdutilisateur($pseudo)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('SELECT IdUtilisateur FROM utilisateur WHERE Pseudo=?');		//Initialisation de la requete
	$requete->execute(array($pseudo));	//Execution de la requete
	$resultat = $requete->fetch();		//Stock le resultat de la requete dans un array
	return $resultat['IdUtilisateur'];
}

function fMotdepasse($pseudo)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	// Optimisation possible requete sur l'id avec fIdutilisateur
	$requete = $bdd->prepare('SELECT MotDePasse FROM utilisateur WHERE Pseudo=?');		//Initialisation de la requete
	$requete->execute(array($pseudo));	//Execution de la requete
	$resultat = $requete->fetch();		//Stock le resultat de la requete dans un array
	return $resultat['MotDePasse'];
}

// <---------------------------------------------------------------------->

function fConnexion($pseudo, $motdepasse)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	if (!is_null(fIdutilisateur($pseudo))) {
		if (password_verify($motdepasse, fMotdepasse($pseudo, $motdepasse))) {	//Vérification du mot de passe
			$_SESSION['IdUtilisateur'] = fIdutilisateur($pseudo);
			return fIdutilisateur($pseudo);
		} else {
			return -1;
		}
	} else {
		return -2;
	}
}

// <---------------------------------------------------------------------->

function fInscription($pseudo, $motdepasse)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	if (is_null(fIdutilisateur($pseudo))) {
		$motdepassehash = password_hash($motdepasse, PASSWORD_DEFAULT); //Hashage du mot de passe
		$requete = $bdd->prepare('INSERT INTO postwork.utilisateur (Pseudo, MotDePasse) VALUES (?, ?)');
		$requete->execute(array($pseudo, $motdepassehash));
		// $commande = "scripts/script_pwuser.sh 1 ".$pseudo." ".$motdepasse;
		// exec($commande);
		return fIdutilisateur('$pseudo');
	} else {
		return -1;
	}
}

function fCreertag($nom)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	if (is_null(fIdtag($nom))) {
		$requete = $bdd->prepare('INSERT INTO postwork.tag (Nom) VALUES (?)');
		$requete->execute(array($nom));
		return fIdtag($nom);
	} else {
		return -1;
	}
}

function fCreercategorie($nom)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	if (is_null(fIdcategorie($nom))) {
		$requete = $bdd->prepare('INSERT INTO postwork.categorie (Nom) VALUES (?)');
		$requete->execute(array($nom));
		return fIdcategorie($nom);
	} else {
		return -1;
	}
}

function fCreersite($nom, $portfolio, $statusvhost, $ip)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	if (is_null(fIdsite($nom))) {
		$nomfqdn = $nom.$globals['fqdnpostwork'];
		$requete = $bdd->prepare('INSERT INTO postwork.site (FQDN, IP, Portfolio, IdUtilisateur, StatusVhost) VALUES (?, ?, ?, ?, ?)');
		if (!isset($ip)) {
			$requete->execute(array($nomfqdn, $globals['ippostwork'], $portfolio, $_SESSION['IdUtilisateur'], $statusvhost));
		} else {
			$requete->execute(array($nomfqdn, $ip, $portfolio, $_SESSION['IdUtilisateur'], $statusvhost));
		}
		return fIdsite($nom);
	} else {
		return -1;
	}
}

function fCreerfqdn($nom, $ip, $portfolio)
{
	if (!isset($portfolio)) {
		fCreersite($nom, 0, 0, $ip);
	} else {
		fCreersite($nom, 1, 0, $ip);
	}
	// $commande = "scripts/script_fqdn.sh 1 ".$nom." ".$ip;
	// exec($commande);
}

function fCreerportfolio($nom)
{
	fCreersite($nom, 1, 1);
	// $commande = "scripts/script_pwhost.sh 1 ".fUtilisateur("Pseudo")." ".$nom;
	// exec($commande);
	return 1;
}

function fCreerprojet($nom)
{
	fCreersite($nom, 0, 1);
	// $commande = "scripts/script_pwhost.sh 1 ".fUtilisateur("Pseudo")." ".$nom;
	// exec($commande);
	return 1;
}

function fTagger($nom)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	if (fIdtag($nom) > 0) {
		$requete = $bdd->prepare('SELECT * FROM tagger WHERE IdTag =? AND IdSite =?');
		$requete->execute(array(fIdtag($nom), $_POST['envoyer']));
		$resultat=$requete->fetch();
		if (is_null($resultat['IdTag'])) {
			$requete = $bdd->prepare('INSERT INTO postwork.tagger (IdTag, IdSite) VALUES (?, ?)');
			$requete->execute(array(fIdtag($nom), $_POST['envoyer']));
		} else {
			return -1;
		}
	} else {
		fCreertag($nom);
		fTagger($nom);
	}
}

// <---------------------------------------------------------------------->

function fDesinscription($motdepasse)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');

	if (fConnexion(fUtilisateur("Pseudo"), $motdepasse) > 0) {
		$requete = $bdd->prepare('DELETE FROM postwork.utilisateur WHERE IdUtilisateur =?');
		$requete->execute(array($_SESSION['IdUtilisateur']));
		// $commande = "scripts/script_user.sh 1 ".$pseudo." ".$motdepasse;
		// exec($commande);
		return 1;
	} else {
		return -1;
	}
}

function fSupprimerfqdn()
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$nomfqdn = fSite("FQDN");
	// $commande = "scripts/script_fqdn.sh 2 ".substr($nomfqdn['Nom'], 0, -19);
	// exec($commande);
	return 1;
}

function fSupprimersite() // A modifier pour une meilleure gestion de la bdd a suppr
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$nomfqdn = fSite("FQDN");
	$requete = $bdd->prepare('DELETE FROM postwork.site WHERE IdSite=?');
	$requete->execute(array($_POST['envoyer']));
	// $commande = "scripts/script_pwhost.sh 2 ".fUtilisateur("Pseudo")." ".substr($nomfqdn['Nom'], 0, -19);
	// exec($commande);
}

function fDetagger($nom)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('DELETE FROM postwork.tagger WHERE IdTag =? AND IdSite =?');
	$requete->execute(array(fIdtag($nom), $_POST['envoyer']));
	return 1;
}

// <---------------------------------------------------------------------->

function fModifierdescription($descrition)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('UPDATE postwork.site SET Description =? WHERE IdSite =?');
	$requete->execute(array($descrition, $_POST['envoyer']));
}

function fModifierfqdn($nom)
{
	require 'source.php';
	
	if (fIdsite($nom) > 0) {
		return -1;
	} else {
		$charset = $bdd->query('SET NAMES UTF8');
		$nomfqdn = $nom.$globals['fqdnpostwork'];
		$requete = $bdd->prepare('UPDATE postwork.site SET FQDN =? WHERE IdSite =?');
		$requete->execute(array($nomfqdn, $_POST['envoyer']));
		$commande = "scripts/script_fqdn.sh 1 ".$nom;
		exec($commande);

	}	
}

function fModifiervhost($valeur)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('UPDATE postwork.site SET StatusVhost =? WHERE IdSite =?');
	$requete->execute(array($valeur, $_POST['envoyer']));
}

function fVhost($action)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$nomfqdn = fSite("FQDN");
	$nom = substr($nomfqdn['Nom'], 0, -19);
	switch ($action) {
		case 0: // Désactiver
		fModifiervhost(0);
		// $commande = "scripts/script_vhost.sh 4 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 1: // Activer
		fModifiervhost(1);
		// $commande = "scripts/script_vhost.sh 3 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 2: // Bloquer
		fModifiervhost(2);
		// $commande = "scripts/script_vhost.sh 4 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 3: // Créer (activation automatique)
		fModifiervhost(1);
		// $commande = "scripts/script_vhost.sh 1 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 4: // Supprimer
		fModifiervhost(0);
		// $commande = "scripts/script_vhost.sh 2 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		default:
		return -1;
		break;
		// exec($commande);
		return 1;
	}
}

function fModifierbdd($valeur)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('UPDATE postwork.site SET StatusBDD =? WHERE IdSite =?');
	$requete->execute(array($valeur, $_POST['envoyer']));
}

function fBdd($action)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$nomfqdn = fSite("FQDN");
	$nom = substr($nomfqdn['Nom'], 0, -19);
	switch ($action) {
		case 0: // Désactiver
		fModifierbdd(0);
		// $commande = "scripts/script_base.sh 4 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 1: // Activer
		fModifierbdd(1);
		// $commande = "scripts/script_base.sh 3 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 2: // Bloquer
		fModifierbdd(2);
		// $commande = "scripts/script_base.sh 4 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 3: // Créer (activation automatique)
		fModifierbdd(1);
		// $commande = "scripts/script_base.sh 1 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 4: // Supprimer
		fModifierbdd(0);
		// $commande = "scripts/script_base.sh 2 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		default:
		return -1;
		break;
		// exec($commande);
		return 1;
	}
}

?>
