<?php
$globals['fqdnpostwork']=".postwork.itinet.fr";
$globals['ippostwork']="88.177.168.133";
try {
		$bdd = new PDO('mysql:host=localhost;dbname=postwork', 'postwork', 'BxGw4J9pmyQFT8G4');
	} catch (Exception $e){
		die("Erreur : " . $e->getMessage());
	}
?>
