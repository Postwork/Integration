<?php
session_start();

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

// <---------------------------------------------------------------------->

function fIdutilisateur($pseudo)
{
  require 'source.php';
  $requete = $bdd->prepare('SELECT IdUtilisateur FROM utilisateur WHERE Pseudo=?');		//Initialisation de la requete
  $requete->execute(array($pseudo));	//Execution de la requete
  $resultat = $requete->fetch();		//Stock le resultat de la requete dans un array
  return $resultat['IdUtilisateur'];
}

function fPseudo($pseudo)
{
  require 'source.php';
  $requete = $bdd->prepare('SELECT Pseudo FROM utilisateur WHERE Pseudo=?');		//Initialisation de la requete
  $requete->execute(array($pseudo));	//Execution de la requete
  $resultat = $requete->fetch();		//Stock le resultat de la requete dans un array
  return $resultat['Pseudo'];
}

function fMotdepasse($pseudo)
{
  require 'source.php';
  $requete = $bdd->prepare('SELECT MotDePasse FROM utilisateur WHERE Pseudo=?');		//Initialisation de la requete
  $requete->execute(array($pseudo));	//Execution de la requete
  $resultat = $requete->fetch();		//Stock le resultat de la requete dans un array
  return $resultat['MotDePasse'];
}

// <---------------------------------------------------------------------->

function fConnexion($pseudo, $motdepasse)
{
  require 'source.php';
  if (!is_null(fPseudo($pseudo))) {
    if (password_verify($motdepasse, fMotdepasse($pseudo, $motdepasse))) {	//Vérification du mot de passe
      return fIdutilisateur($pseudo);
      // $_SESSION['IdUtilisateur'] = fIdutilisateur($pseudo);
    } else {
      return 'Mot de passe invalide.';
    }
  } else {
    return "Mauvais Pseudo.";
  }
}

// <---------------------------------------------------------------------->

function fInscription($pseudo, $motdepasse)
{
  require 'source.php';
  if (is_null(fPseudo($pseudo))) {
    $motdepassehash = password_hash($motdepasse, PASSWORD_DEFAULT); //Hashage du mot de passe
    $requete = $bdd->prepare('INSERT INTO postwork.utilisateur (Pseudo, MotDePasse) VALUES (?, ?)');
    $requete->execute(array($pseudo, $motdepassehash));
    return fIdutilisateur('$pseudo');
  } else {
    return "Pseudo indisponible.";
  }
}

function fCreertag($nom)
{
  require 'source.php';
  $requete = $bdd->prepare('SELECT IdTag FROM tag WHERE Nom=?'); // peut evoluer vers un LIKE ??
  $requete->execute(array($nom));
  $resultat = $requete->fetch();
  if (is_null($resultat['IdTag'])) {
    $requete = $bdd->prepare('INSERT INTO postwork.tag (Nom) VALUES (?)');
    $requete->execute(array($nom));
  } else {
    return "Ce tag existe.";
  }
}
echo fCreertag('nodejs');

echo "<br><br>Fin !";
?>
