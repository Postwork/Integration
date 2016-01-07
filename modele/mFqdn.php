<?php
session_start();
require 'fonction.php';

if (isset($_POST['envoyer'])) {
  fCreerfqdn($_POST['nom'], $_POST['ip'], 0);
  echo $_SESSION['IdUtilisateur'];
}

?>
