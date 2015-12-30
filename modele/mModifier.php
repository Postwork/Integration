<?php
	session_start();
	require 'fonction.php';
	$site = fCesite();
	$fqdn = substr($site['FQDN'], 0, -19);
	$ip = $site['IP'];
	$description = $site['Description'];
	$categorie = $site['Categorie'];
	echo $idcategorie = $site['IdCat'];
?>