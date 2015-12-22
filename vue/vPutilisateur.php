<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    
        <link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.css">      
       <!--  <link rel="stylesheet" href=" vue/style.css">  -->
    
  </head>
<body>
<?php
include_once("vNavco.php");
?>
<div class="container petit">
	<h1> Paramètres du comptes </h1>
	<br/>
	<br/>
<table class="table table-striped">
<tr>
	<td>Pseudo</td>
	<td>Babou</td>
	<td> <input type="text" name="pseudo"> </td> 
</tr>
<tr>
	<td>Prenom</td>
	<td>Bastian</td>
	<td> <input type="text" name="prenom"> </td> 
</tr>
<tr>
	<td>Nom</td>
	<td>Bel-Ange</td>
	<td> <input type="text" name="nom"> </td> 
</tr>
<tr>
	<td>date de naissance</td>
	<td>12/09/1995</td>
	<td> <input type="date" name="datenaissance"> </td> 
</tr>
<tr>
	<td>Mot de passe</td>
	<td>****</td>
	<td> <input type="password" name="motdepasse"> </td> 

</tr>
<td> <button type="submit" name="envoyer">Modifier les parametres du compte</button> </td>
</table>
</div>
<?php
include_once("vFooter.php");
?>


</body>
</html>