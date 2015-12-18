

  <?php
	session_start();

	#$bdd = PDO('mysql:host=localhost;dbname=postwork', 'postwork', 'postwork');

	if (!empty($_GET['page']) AND is_file('controleur/'.$_GET['page'].'.php')) {
		include('controleur/'.$_GET['page'].'.php');
	}
	else {
		include('controleur/index.php');
	}
?>

