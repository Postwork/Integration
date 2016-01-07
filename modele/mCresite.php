<?php
  session_start();
  echo $_SESSION['IdUtilisateur'];
  if (isset($_POST['envoyer'])) {
    require 'fonction.php';
    // fCreerprojet($_POST['nom'], 1);
    // fCreerportfolio($_POST['nom']);


    // Recuperation des variables
    // $nom=htmlspecialchars($_POST['nom']);
    // $portfolio=htmlspecialchars($_POST['portfolio']);
    // $stattusbdd=htmlspecialchars($_POST['statusbdd']);

  }
?>
