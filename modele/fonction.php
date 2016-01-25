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
		LEFT JOIN tag ON tagger.IdTag = tag.IdTag
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

function fParametreutilisateur()
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('SELECT Prenom, Nom, DateNaissance, EmailExt FROM postwork.utilisateur WHERE IdUtilisateur=?');
	$requete->execute(array($_SESSION['IdUtilisateur']));
	$resultat = $requete->fetch();
	return $resultat;
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
			return $_SESSION['erreur'] = "Erreur mot de passe incorrect.";
		}
	} else {
		return $_SESSION['erreur'] = "Erreur mauvais pseudo.";
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
		$_SESSION['IdUtilisateur'] = fIdutilisateur($pseudo);
		fCreerportfolio($pseudo);
		unset($_SESSION['IdUtilisateur']);
		$commande = "scripts/script_pwuser.sh 1 ".$pseudo." ".$motdepasse;
		exec($commande);
		$commande = "scripts/script_pwhost.sh 1 ".$pseudo." ".$pseudo;
		exec($commande);
		return fIdutilisateur($pseudo);
	} else {
		return $_SESSION['erreur'] = "Erreur pseudo indisponible.";
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
		return $_SESSION['erreur'] = "Erreur cette catégorie existe déjà.";
	}
}

function fCreersite($nom, $portfolio, $bdd, $ip)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	if (!filter_var($nom, FILTER_VALIDATE_URL) === true) {
		if (is_null(fIdsite($nom))) {
			$nomfqdn = $nom.$globals['fqdnpostwork'];
			$requete = $bdd->prepare('INSERT INTO postwork.site (FQDN, IP, Portfolio, IdUtilisateur, StatusBDD, StatusVhost) VALUES (?, ?, ?, ?, ?, ?)');
			if (isset($ip) === true) {
				if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4, FILTER_NO_PRIV_RANGE, FILTER_FLAG_NO_RES_RANGE) === true) {
					$requete->execute(array($nomfqdn, $ip, $portfolio, $_SESSION['IdUtilisateur'], "0", "1"));
				} else {
					return $_SESSION['erreur']="Mauvaise adresse IP.";
				}
			} else {
				if (isset($_SESSION['IdUtilisateur'])) {
					$requete->execute(array($nomfqdn, $globals['ippostwork'], $portfolio, $_SESSION['IdUtilisateur'], "1", "1"));
				} elseif (!is_null(fIdutilisateur($nom))) {
					$requete->execute(array($nomfqdn, $globals['ippostwork'], $portfolio, fIdutilisateur($nom), $bdd, "1"));
				} else {
					return $_SESSION['erreur'] = "Erreur utilisateur inexistant.";
				}
			}
			return fIdsite($nom);
		} else {
			return $_SESSION['erreur'] = "Erreur nom de site indisponible.";
		}
	} else {
		$_SESSION['erreur']="Nom invalide.";
	}
}

function fCreerfqdn($nom, $ip)
{
	fCreersite($nom, 0, 0, $ip);
	$commande = "scripts/script_fqdn.sh 1 ".$nom." ".$ip;
	exec($commande);
}

function fCreerportfolio($pseudo)
{
	fCreersite($pseudo, 1, 0);
	$commande = "scripts/script_pwhost.sh 1 ".fUtilisateur("Pseudo")." ".$pseudo;
	exec($commande);
	$commande = "scripts/script_base.sh 2 ".fUtilisateur("Pseudo")." ".$pseudo;
	exec($commande);
	return 1;
}

function fCreerprojet($nom)
{
	fCreersite($nom, 0, 1);
	$commande = "scripts/script_pwhost.sh 1 ".fUtilisateur("Pseudo")." ".$nom;
	exec($commande);
	return 1;
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
		return $_SESSION['erreur'] = "Erreur ce tag existe déjà.";
	}
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
		return $_SESSION['erreur'] = "Erreur ce tag est déjà associé à votre site.";
	}	
}

function fTagger2($nom)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');	
	$requete = $bdd->prepare('SELECT IdTag FROM tag WHERE Nom LIKE ? ');
	$requete->execute(array($nom));
	$resultat=$requete->fetch();
	if (is_null($resultat['IdTag'])) {
		fTagger(fCreertag($nom));
	} else {
		fTagger($resultat['IdTag']);
	}	
}

// <---------------------------------------------------------------------->

function fDesinscription($motdepasse)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');

	if (fConnexion(fUtilisateur("Pseudo"), $motdepasse) > 0) {
		$liste = fAffichersiteutilisateur();
		foreach ($liste as $key => $value) {
			$nom = substr($value['Nom'],  0, -19);
			$commande = "scripts/script_pwhost.sh 2 ".fUtilisateur("Pseudo")." ".$nom;
			$_SESSION['erreur'] = $commande;
			exec($commande);
		}
		$requete = $bdd->prepare('DELETE FROM postwork.utilisateur WHERE IdUtilisateur =?');
		$requete->execute(array($_SESSION['IdUtilisateur']));
		$commande = "scripts/script_pwuser.sh 2 ".$pseudo." ".$motdepasse;
		exec($commande);
		session_destroy();
		header("Location: index.php?page=deconnexion");
		return 1;
	} else {
		return $_SESSION['erreur'];
	}
}

function fSupprimersite() // A modifier pour une meilleure gestion de la bdd a suppr
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$nomfqdn = fSite("FQDN");
	$requete = $bdd->prepare('DELETE FROM postwork.site WHERE IdSite =? AND IdUtilisateur =?');
	$requete->execute(array($_POST['envoyer'], $_SESSION['IdUtilisateur']));
	$commande = "scripts/script_pwhost.sh 2 ".fUtilisateur("Pseudo")." ".substr($nomfqdn, 0, -19);
	exec($commande);
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
		return $_SESSION['erreur'] = "Erreur tentative frauduleuse.";
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
	if (fSite('StatusVhost') == 2) {
		return $_SESSION['erreur'] = "Votre site a été bloqué par l'administrateur.";
	} else {
		if (fIdsite($nom) > 0) {
			return $_SESSION['erreur'] = "Erreur nom indisponible.";
		} else {
			$charset = $bdd->query('SET NAMES UTF8');
			$commande = "scripts/script_fqdn.sh 2 ".substr(fSite('FQDN'), 0, -19);
			exec($commande);
			fVhost(4);
			$nomfqdn = $nom.$globals['fqdnpostwork'];
			$requete = $bdd->prepare('UPDATE postwork.site SET FQDN =? WHERE IdSite =? AND IdUtilisateur =?');
			$requete->execute(array($nomfqdn, $_POST['envoyer'], $_SESSION['IdUtilisateur']));
			fVhost(3);
			$commande = "scripts/script_fqdn.sh 1 ".$nom;
			exec($commande);
		}
	}
}

function fModifierip($ip)
{
	if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_NO_PRIV_RANGE, FILTER_FLAG_NO_RES_RANGE) === true) {
		require 'source.php';
		if (fSite('StatusVhost') == 2) {
			return $_SESSION['erreur'] = "Votre site a été bloqué par l'administrateur.";
		} else {
			if (fSite('IP') == $ip) {
				return $_SESSION['erreur'] = "Erreur vous n'avez effectué aucune modification.";
			} else {
				$charset = $bdd->query('SET NAMES UTF8');
				$commande = "scripts/script_fqdn.sh 2 ".substr(fSite('FQDN'), 0, -19);
				exec($commande);
				$requete = $bdd->prepare('UPDATE postwork.site SET IP =? WHERE IdSite =? AND IdUtilisateur =?');
				fModifiervhost(1);
				if ($ip == $globals['ippostwork']) {
					$commande = "scripts/script_pwhost.sh 1 ".fUtilisateur('Pseudo')." ".substr(fSite('FQDN'), 0, -19);
				} elseif (fSite('IP') == $globals['ippostwork']) {
					$commande = "scripts/script_pwhost.sh 2 ".fUtilisateur('Pseudo')." ".substr(fSite('FQDN'), 0, -19);
					exec($commande);
					$commande = "scripts/script_fqdn.sh 1 ".substr(fSite('FQDN'), 0, -19)." ".$ip;
				} else {
					$commande = "scripts/script_fqdn.sh 1 ".substr(fSite('FQDN'), 0, -19)." ".$ip;
				}
				$requete->execute(array($ip, $_POST['envoyer'], $_SESSION['IdUtilisateur']));
				exec($commande);
			}
		}
	} else {
		$_SESSION['erreur'] = "Erreur adresse IP invalide.";
	}
}

function fParametre($prenom, $nom, $datedenaissance, $email)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('UPDATE postwork.utilisateur SET Prenom =?, Nom = ?, DateNaissance =?, EmailExt =?  WHERE IdUtilisateur =?');
	$requete->execute(array($prenom, $nom, $datedenaissance, $email, $_SESSION['IdUtilisateur']));
}

function fChangermotdepasse($ancienmdp, $nouveaumdp)
{
	require 'source.php';
	if ($_SESSION['erreur'] = fConnexion(fUtilisateur("Pseudo"), $ancienmdp) > 0) {
		$charset = $bdd->query('SET NAMES UTF8');
		$requete = $bdd->prepare('UPDATE postwork.utilisateur SET MotDePasse =?  WHERE IdUtilisateur =?');
		$motdepassehash = password_hash($nouveaumdp, PASSWORD_DEFAULT);
		$requete->execute(array($motdepassehash, $_SESSION['IdUtilisateur']));
	} else {
		return $_SESSION['erreur'];
	}	
}

function fChangermail($mail)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('UPDATE postwork.utilisateur SET EmailExt =? WHERE IdUtilisateur =?');
	$requete->execute(array($mail, $_SESSION['IdUtilisateur']));
}

function fModifiermail($valeur)
{
	require 'source.php';
	$charset = $bdd->query('SET NAMES UTF8');
	$requete = $bdd->prepare('UPDATE postwork.utilisateur SET StatusMail =? WHERE IdUtilisateur =?');
	$requete->execute(array($valeur, $_SESSION['IdUtilisateur']));
}

function fMail($action)
{
	require 'source.php';
	if (fUtilisateur('StatusMail') == 2) {
		return $_SESSION['erreur'] = "Votre compte mail a été bloqué par l'administrateur.";
	} else {
		$charset = $bdd->query('SET NAMES UTF8');
		switch ($action) {
			case 0: // Désactiver
			fModifiermail(0);
			$commande = "scripts/script_mail.sh 4 ".fUtilisateur("Pseudo");
			break;
			case 1: // Activer
			fModifiermail(1);
			$commande = "scripts/script_mail.sh 3 ".fUtilisateur("Pseudo");
			break;
			case 2: // Bloquer
			fModifiermail(2);
			$commande = "scripts/script_mail.sh 4 ".fUtilisateur("Pseudo");
			break;
			default:
			return $_SESSION['erreur'] = "Erreur tentative frauduleuse.";
			break;
		}
	}
	exec($commande);
	return 1;
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
		return $_SESSION['erreur'] = "Votre site a été bloqué par l'administrateur.";
	} else {
		$charset = $bdd->query('SET NAMES UTF8');
		$nomfqdn = fSite("FQDN");
		$nom = substr($nomfqdn, 0, -19);
		switch ($action) {
		case 0: // Désactiver
		fModifiervhost(0);
		echo $commande = "scripts/script_vhost.sh 4 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 1: // Activer
		fModifiervhost(1);
		echo $commande = "scripts/script_vhost.sh 3 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 2: // Bloquer
		fModifiervhost(2);
		$commande = "scripts/script_vhost.sh 4 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 3: // Créer (activation automatique)
		fModifiervhost(1);
		echo $commande = "scripts/script_vhost.sh 1 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 4: // Supprimer
		fModifiervhost(0);
		echo $commande = "scripts/script_vhost.sh 2 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		default:
		return $_SESSION['erreur'] = "Erreur action inattendue.";
		break;
	}
	exec($commande);
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
		return $_SESSION['erreur'] = "L'accès à votre base de données a été bloqué par l'administrateur.";
	} else {
		$charset = $bdd->query('SET NAMES UTF8');
		$nomfqdn = fSite("FQDN");
		$nom = substr($nomfqdn, 0, -19);
		switch ($action) {
		case 0: // Désactiver
		fModifierbdd(0);
		$commande = "scripts/script_base.sh 2 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 1: // Activer
		fModifierbdd(1);
		$commande = "scripts/script_base.sh 1 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		case 2: // Bloquer
		fModifierbdd(2);
		$commande = "scripts/script_base.sh 2 ".fUtilisateur("Pseudo")." ".$nom;
		break;
		default:
		return $_SESSION['erreur'] = "Erreur action inattendue.";
		break;
	}
	exec($commande);
	return 1;
}
}

function fErreur()
{
	if (isset($_SESSION['erreur'])) {
		echo '<div class="alert alert-danger" role="alert">'.$_SESSION['erreur'].'</div>';
		unset($_SESSION['erreur']);
	}
}

?>
