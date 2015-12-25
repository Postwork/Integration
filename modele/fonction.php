<?php
function fUtilisateur($champ)
{
  require 'source.php';
  $requete = $bdd->prepare('SELECT * FROM utilisateur WHERE IdUtilisateur=?');		//Initialisation de la requete
  $requete->execute(array($_SESSION['IdUtilisateur']));	//Execution de la requete
  $resultat = $requete->fetch();		//Stock le resultat de la requete dans un array
  return $resultat[$champ];
}

// function fSite($champ)
// {
//   require 'source.php';
//   $requete = $bdd->prepare('SELECT * FROM site WHERE IdUtilisateur=?');		//Initialisation de la requete
//   $requete->execute(array($_SESSION['IdUtilisateur']));	//Execution de la requete
//   $resultat = $requete->fetch();		//Stock le resultat de la requete dans un array
//   return $resultat[$champ];
// }

function fIdtag($nom)
{
  require 'source.php';
  $requete = $bdd->prepare('SELECT IdTag FROM tag WHERE Nom=?');
  $requete->execute(array($nom));
  $resultat = $requete->fetch();
  return $resultat['IdTag'];
}

function fIdcategorie($nom)
{
  require 'source.php';
  $requete = $bdd->prepare('SELECT IdCategorie FROM categorie WHERE Nom=?');
  $requete->execute(array($nom));
  $resultat = $requete->fetch();
  return $resultat['IdCategorie'];
}

function fIdfqdn($nom)
{
  require 'source.php';
  $nomfqdn = $nom.$globals['fqdnpostwork']; // nom de machine -> fqdn
  $requete = $bdd->prepare('SELECT IdFQDN FROM fqdn WHERE Nom=?'); // peut evoluer vers un LIKE ??
  $requete->execute(array($nomfqdn));
  $resultat = $requete->fetch();
  return $resultat['IdFQDN'];
}

function fIdsite($nom)
{
  require 'source.php';
  $nomfqdn = $nom.$globals['fqdnpostwork']; // nom de machine -> fqdn
  $requete = $bdd->prepare('SELECT site.IdSite FROM site INNER JOIN fqdn ON fqdn.IdFQDN = site.IdFQDN WHERE Nom=?');
  $requete->execute(array($nomfqdn));
  $resultat = $requete->fetch();
  return $resultat['IdSite'];
}

// <---------------------------------------------------------------------->

function fIdutilisateur($pseudo)
{
  require 'source.php';
  $requete = $bdd->prepare('SELECT IdUtilisateur FROM utilisateur WHERE Pseudo=?');		//Initialisation de la requete
  $requete->execute(array($pseudo));	//Execution de la requete
  $resultat = $requete->fetch();		//Stock le resultat de la requete dans un array
  return $resultat['IdUtilisateur'];
}

// function fPseudo($pseudo)
// {
//   require 'source.php';
//   $requete = $bdd->prepare('SELECT Pseudo FROM utilisateur WHERE Pseudo=?');		//Initialisation de la requete
//   $requete->execute(array($pseudo));	//Execution de la requete
//   $resultat = $requete->fetch();		//Stock le resultat de la requete dans un array
//   return $resultat['Pseudo'];
// }

function fMotdepasse($pseudo)
{
  require 'source.php';
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
  if (!is_null(fIdutilisateur($pseudo))) {
    if (password_verify($motdepasse, fMotdepasse($pseudo, $motdepasse))) {	//Vérification du mot de passe
      return fIdutilisateur($pseudo);
      // $_SESSION['IdUtilisateur'] = fIdutilisateur($pseudo);
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
  if (is_null(fIdutilisateur($pseudo))) {
    $motdepassehash = password_hash($motdepasse, PASSWORD_DEFAULT); //Hashage du mot de passe
    $requete = $bdd->prepare('INSERT INTO postwork.utilisateur (Pseudo, MotDePasse) VALUES (?, ?)');
    $requete->execute(array($pseudo, $motdepassehash));
    return fIdutilisateur('$pseudo');
  } else {
    return -1;
  }
}

function fCreertag($nom)
{
  require 'source.php';
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
  if (is_null(fIdcategorie($nom))) {
    $requete = $bdd->prepare('INSERT INTO postwork.categorie (Nom) VALUES (?)');
    $requete->execute(array($nom));
    return fIdcategorie($nom);
  } else {
    return -1;
  }
}

function fCreerfqdn($nom, $ip)
{
  require 'source.php';
  if (is_null(fIdfqdn($nom))) {
    $nomfqdn = $nom.$globals['fqdnpostwork'];
    if (is_null($ip)) {
      $requete = $bdd->prepare('INSERT INTO postwork.fqdn (Nom, IP) VALUES (?, ?)');
      $requete->execute(array($nomfqdn, $globals['ippostwork']));
      return fIdfqdn($nom);
    } else {
      $requete = $bdd->prepare('INSERT INTO postwork.fqdn (Nom, IP) VALUES (?, ?)');
      $requete->execute(array($nomfqdn, $ip));
      return fIdfqdn($nom);
    }
  } else {
    return -1;
  }
}

function fCreersite($nom, $portfolio, $statusbdd)
{
  require 'source.php';
  if (fCreerfqdn($nom) > 0) {
    $requete = $bdd->prepare('INSERT INTO postwork.site (Portfolio, StatusBDD, IdUtilisateur, IdFQDN) VALUES (?, ?, ?, ?)');
    $requete->execute(array($portfolio, $statusbdd, $_SESSION['IdUtilisateur'], fIdfqdn($nom)));
    return fIdsite($nom);
  } else {
    return -1;
  }
}

// function fTagger($nom)
// {
//   require 'source.php';
//   if (fIdtag($nom) > 0) {
//     $requete = $bdd->prepare('SELECT * FROM tagger WHERE IdTag =? AND IdSite =?');
//     $requete->execute(array(fIdtag($nom), $_POST['envoyer']));
//     $resultat=$requete->fetch();
//     if (is_null($resultat['IdTag'])) {
//       $requete = $bdd->prepare('INSERT INTO postwork.tagger (IdTag, IdSite) VALUES (?, ?)');
//       $requete->execute(array(fIdtag($nom), $_POST['envoyer']));
//     } else {
//       return -1;
//     }
//   } else {
//     fCreertag($nom);
//     fTagger($nom);
//   }
// }
?>
