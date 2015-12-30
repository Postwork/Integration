<?php
session_start();
require 'fonction.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // fCreerportfolio($_POST['nom']);
  // fCreerprojet($_POST['nom'], $_POST['ok']);
  
 // echo  fCreerfqdn($_POST['nom'], $_POST['nom1']);
  // fModifierdescription($_POST['nom']);
  // echo fSite("Description");
  // $sortie = file($_POST['nom']);
  // foreach ($sortie as $key => $value) {
  //   echo $sortie[$key]."<br>";
  // }
}
echo "<br>".$_SESSION['IdUtilisateur'];
echo "<br><br>Fin !";
// unset($_SESSION['IdUtilisateur']);
?>