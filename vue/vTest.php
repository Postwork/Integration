<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Test</title>
  <link rel="stylesheet" href="vue/contenu/bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="vue/contenu/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  include_once("vNav.php");
  ?>
  <div class="container petit">
    <!--       <h1> Activer ou desactiver ses sites</h1>  -->
  </br>  

  <h2> Création </h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>FQDN</th>
        <th>IP</th>
        <th></th>
      </tr>
    </thead>
    <tr>
      <form method="POST" name="fqdn" action="?page=test">
        <td>  <input type="text" class="form-inline" name="nom" value="toto"> .postwork.itinet.fr </td>
        <td> <input type="text" class="form-inline" name="ip"></td>
        <td><button type="submit" name="envoyer" value="1">Créer </button></td>
      </form>
    </tr>
  </table>

  <h2>Portfolio</h2>

	<?php
	if (isset($_POST['envoyer'])) {
		// require 'fonction.php';
		echo fSite('Description');
		// fSite("FQDN");
		// String();
	}
	?>

  <?php
    if (isset($_POST['envoyer'])) {
      foreach ( $site as $key => $value) {
        if (is_string($key)) {
          echo $key." : ".$value."<br>";
        }
      }
    }
    ?>

  <h2>Projets</h2>
  <table class="table table-striped">

    <thead>
      <tr>
        <th>Etat du site</th>
        <th>FQDN</th>
        <th>IP</th>
        <th>BDD</th>
        <th></th>
        <th></th>
      </tr>
    </thead>


    <tr>
      <td> 
        <input type="checkbox" name="lien1" value="nom du lien"  font-weight:bold"onclick" checked>
        activé
      </td>
      <td>John.postwork.itinet.fr</td>
      <td>192.168.0.0</td>
      <td> 
        <input type="checkbox" name="lien1" value="nom du lien"  font-weight:bold"onclick" checked>
      </td>
      <td><button type="submit" name="envoyer">modifier</button></td>
      <td><button type="submit" name="envoyer">supprimer</button></td>
    </tr> 

  </table>
</div>
<?php
include_once("vFooter.php");
?>
</body>
</html>













  <!-- <div class="container">
  <h1>Test</h1>
  <form class="form" method="POST" action="?page=test">
  <div class="col-xs-3">
  <input type="text" class="form-control" name="pseudo" value="riri" >
</div>
<div class="col-xs-3">
<input type="password" class="form-control" name="motdepasse">
</div>
<button type="submit" name="envoyer">Envoyer</button>
</form>
</div> -->
<!-- <div class="container petit">
  <h1> Creer votre site</h1>
  <br>
  <form class="form-inline" method="POST" role="form" action="?page=test">
    <input class="form-inline" type="text" name="nom" placeholder="nom">
    <input class="form-inline" type="text" name="nom1" placeholder="nom1" >
    <input class="form-inline" type="checkbox" name="ok" value="1">
    <button class="btn btn-success glyphicon glyphicon-ok" type="submit" name="envoyer" value="1"></button>
  </form>
</div>
</body>
</html> -->
