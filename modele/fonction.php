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
	$requete = $bdd->prepare('SELECT site.IdSite, tag.IdTag, tag.Nom AS Tag
		FROM site
		INNER JOIN tagger ON site.IdSite = tagger.IdSite AND site.IdSite = ?
		RIGHT JOIN tag ON tagger.IdTag = tag.IdTag
		ORDER BY site.IdSite DESC, Tag ASC');
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

function fAffichersiteutilisateur()
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('SELECT * FROM site WHERE IdUtilisateur=?');
	$requete->execute(array($_SESSION['IdUtilisateur']));
	$resultat = $requete->fetchAll();
	return $resultat;
}

// <---------------------------------------------------------------------->

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

// function fCesite()
// {
// 	require 'source.php';
// 	$charset = $bdd->query('SET NAMES UTF8');
// 	$requete = $bdd->prepare('SELECT FQDN, IP, StatusVhost, StatusBDD, Description, site.IdCategorie FROM site LEFT JOIN categorie ON site.IdCategorie = categorie.IdCategorie WHERE IdSite=?');
// 	$requete->execute(array($_POST['envoyer']));
// 	$resultat = $requete->fetch();
// 	return $resultat;
// }

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
	if (is_null(fIdutilisateur($pseudo)) and is_null(fIdsite($pseudo))) {
		$motdepassehash = password_hash($motdepasse, PASSWORD_DEFAULT); //Hashage du mot de passe
		$requete = $bdd->prepare('INSERT INTO postwork.utilisateur (Pseudo, MotDePasse) VALUES (?, ?)');
		$requete->execute(array($pseudo, $motdepassehash));
		fCreerportfolio($pseudo);
		// $commande = "scripts/script_pwuser.sh 1 ".$pseudo." ".$motdepasse;
		// exec($commande);
		return fIdutilisateur($pseudo);
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
			if (isset($_SESSION['IdUtilisateur'])) {
				$requete->execute(array($nomfqdn, $globals['ippostwork'], $portfolio, $_SESSION['IdUtilisateur'], $statusvhost));
			} else {
				$requete->execute(array($nomfqdn, $globals['ippostwork'], $portfolio, fIdutilisateur($nom), $statusvhost));
			}
		} else {
			$requete->execute(array($nomfqdn, $ip, $portfolio, $_SESSION['IdUtilisateur'], $statusvhost));
		}
		return fIdsite($nom);
	} else {
		return -1;
	}
}

function fCreerfqdn($nom, $ip)
{
	fCreersite($nom, 0, 0, $ip);
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

function fTagger($idtag)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');	
	$requete = $bdd->prepare('SELECT * FROM tagger WHERE IdTag =? AND IdSite =?');
	$requete->execute(array($idtag, $_POST['envoyer']));
	$resultat=$requete->fetch();
	if (is_null($resultat['IdTag'])) {
		$requete = $bdd->prepare('INSERT INTO postwork.tagger (IdTag, IdSite) VALUES (?, ?)');
		$requete->execute(array($idtag, $_POST['envoyer']));
	} else {
		return -1;
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

function fSupprimersite() // A modifier pour une meilleure gestion de la bdd a suppr
{
	require 'source.php';
	echo "string";
	$charset = $bdd->query('SET NAMES UTF8');
	echo "string";
	$nomfqdn = fSite("FQDN");
	echo "string";
	$requete = $bdd->prepare('DELETE FROM postwork.site WHERE IdSite =? AND IdUtilisateur =?');
	echo "string";
	$requete->execute(array($_POST['envoyer'], $_SESSION['IdUtilisateur']));
	echo "string";
	// $commande = "scripts/script_pwhost.sh 2 ".fUtilisateur("Pseudo")." ".substr($nomfqdn['Nom'], 0, -19);
	// exec($commande);
}

function fDetagger($idtag)
{
	require 'source.php';
	if ($_SESSION['IdUtilisateur'] == fSite('IdUtilisateur')) {
		$charset = $bdd->query('SET NAMES UTF8');
		$requete = $bdd->prepare('DELETE FROM postwork.tagger WHERE IdTag =? AND IdSite =?');
		$requete->execute(array($idtag, $_POST['envoyer']));
		return 1;
	} else {
		return -1;
	}
}

// <---------------------------------------------------------------------->

function fModifierdescription($description)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('UPDATE postwork.site SET Description =? WHERE IdSite =? AND IdUtilisateur =?');
	$requete->execute(array($description, $_POST['envoyer'], $_SESSION['IdUtilisateur']));
}

function fModifiercategorie($categorie)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('UPDATE postwork.site SET IdCategorie =? WHERE IdSite =? AND IdUtilisateur =?');
	$requete->execute(array($categorie, $_POST['envoyer'], $_SESSION['IdUtilisateur']));
}

function fModifierfqdn($nom)
{
	require 'source.php';
	if (fSite('StatusExt') == 2 xor fSite('StatusVhost') == 2) {
		return -1;
	} else {
		if (fIdsite($nom) > 0) {
			return -1;
		} else {
			$charset = $bdd->query('SET NAMES UTF8');
		// $commande = "scripts/script_fqdn.sh 2 ".substr(fSite('FQDN'), 0, -19);
		// exec($commande);
			fVhost(4);
			$nomfqdn = $nom.$globals['fqdnpostwork'];
			$requete = $bdd->prepare('UPDATE postwork.site SET FQDN =? WHERE IdSite =? AND IdUtilisateur =?');
			$requete->execute(array($nomfqdn, $_POST['envoyer'], $_SESSION['IdUtilisateur']));
			fVhost(3);
		// $commande = "scripts/script_fqdn.sh 1 ".$nom;
		// exec($commande);
		}
	}
}

function fModifierip($ip)
{
	require 'source.php';
	if (fSite('StatusExt') == 2 xor fSite('StatusVhost') == 2) {
		return -1;
	} else {
		if (fSite('IP') == $ip) {
			return -1;
		} else {
			$charset = $bdd->query('SET NAMES UTF8');
		// $commande = "scripts/script_fqdn.sh 2 ".substr(fSite('FQDN'), 0, -19);
		// exec($commande);
			$requete = $bdd->prepare('UPDATE postwork.site SET IP =?, StatusExt =? WHERE IdSite =? AND IdUtilisateur =?');
			if ($ip == $globals['ippostwork']) {
				fVhost(3);
				$requete->execute(array($ip, 0, $_POST['envoyer'], $_SESSION['IdUtilisateur']));
			} else {
				fVhost(4);
				$requete->execute(array($ip, 1, $_POST['envoyer'], $_SESSION['IdUtilisateur']));
			}
		// $commande = "scripts/script_fqdn.sh 1 ".substr(fSite('FQDN'), 0, -19);
		// exec($commande);
		}
	}
	
}

function fModifiervhost($valeur)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('UPDATE postwork.site SET StatusVhost =? WHERE IdSite =? AND IdUtilisateur =?');
	$requete->execute(array($valeur, $_POST['envoyer'], $_SESSION['IdUtilisateur']));
}

function fVhost($action)
{
	require 'source.php';
	if (fSite('StatusVhost') == 2) {
		return -1;
	} else {
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
	}
	// exec($commande);
	return 1;
}
}

function fModifierbdd($valeur)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('UPDATE postwork.site SET StatusBDD =? WHERE IdSite =? AND IdUtilisateur =?');
	$requete->execute(array($valeur, $_POST['envoyer'], $_SESSION['IdUtilisateur']));
}

function fBdd($action)
{
	require 'source.php';
	if (fSite('StatusBDD') == 2) {
		return -1;
	} else {
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
	}
	// exec($commande);
	return 1;
}
}

function fModifiermail($valeur)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('UPDATE postwork.utilisateur SET StatusMail =? WHERE IdUtilisateur =?');
	$requete->execute(array($valeur, $_SESSION['IdUtilisateur']));
}

function fMail($value='')
{
	if (fSite('StatusMail') == 2) {
		return -1;
	} else {

	}
}

?>
