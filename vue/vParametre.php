<!DOCTYPE html>
<html >
<head>
	<meta charset="UTF-8">
	<title>Inscription</title>
	
	<link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="vue/contenu/bootstrap/js/bootstrap.min.js"></script>  
	<!--  <link rel="stylesheet" href=" vue/style.css">  -->
	
</head>
<body>
	<?php
	include_once("vNavco.php");
	?>
	<div class="container petit">
		<h1> Paramètres du compte </h1>
		<br/>
		<br/>
		<table class="table table-striped">
			<tr>
				<form action="index.php?page=parametre">
					<td>Pseudo</td>
					<td>Babou</td>
					<td> <input type="text" name="pseudo"> </td> 
					<td> <button type="submit" name="envoyer">Modifier</button> </td>
				</form>
			</tr>
			<tr>
				<form action="index.php?page=parametre">
					<td>Prenom</td>
					<td>Bastian</td>
					<td> <input type="text" name="prenom"> </td> 
					<td> <button type="submit" name="envoyer">Modifier</button> </td>
				</form>
			</tr>
			<tr>
				<form action="index.php?page=parametre">
					<td>Nom</td>
					<td>Bel-Ange</td>
					<td> <input type="text" name="nom"> </td> 
					<td> <button type="submit" name="envoyer">Modifier</button> </td>
				</form>
			</tr>
			<tr>
				<form action="index.php?page=parametre">
					<td>Date de naissance</td>
					<td>12/09/1995</td>
					<td> <input type="date" name="datenaissance"> </td> 
					<td> <button type="submit" name="envoyer">Modifier</button> </td>
				</form>
			</tr>
			<tr>
				<form action="index.php?page=parametre">
					<td>Mot de passe</td>
					<td>****</td>
					<td> <input type="password" name="motdepasse"> </td> 
					<td> <button type="submit" name="envoyer">Modifier</button> </td>
				</form>


			</tr>
			<tr>
				<form action="index.php?page=parametre">
					<td>Mail</td>
					<td>bastian@postwork.itinet.fr</td>
					<td> <input type="text" name="Mail"> </td> 
					<td> <button type="submit" name="envoyer">Modifier</button> </td>
				</form>

			</tr>

		</table>
	</div>
	<?php
	include_once("vFooter.php");
	?>


</body>
</html>