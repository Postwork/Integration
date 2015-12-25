<?php
  session_start();
  if (isset($_POST['envoyer'])) {

    require 'source.php';

    // Recuperation des variables
    $nom=htmlspecialchars($_POST['nom']);
    $ip=htmlspecialchars($_POST['ip']);
    $portfolio=htmlspecialchars($_POST['portfolio']);
    $stattusbdd=htmlspecialchars($_POST['stattusbdd']);
    $description=htmlspecialchars($_POST['description']);

  }
?>
