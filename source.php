<?php
<<<<<<< HEAD
$_SESSION['fqdnpostwork']=".postwork.itinet.fr";
$_SESSION['ippostwork']="88.177.168.133";
=======
$globals['fqdnpostwork']=".postwork.itinet.fr";
$globals['ippostwork']="88.177.168.133";
>>>>>>> b42a78479ce4667685d0f3d05da2842e42620270
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=postwork', 'postwork', 'BxGw4J9pmyQFT8G4');
	} catch (Exception $e){
		die("Erreur : " . $e->getMessage());
	}
?>
