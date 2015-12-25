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
<div class="container petit">
  <h1> Creer votre site</h1>
  <br>
  <form class="form-inline" method="POST" role="form" action="?page=cresite">
    <div class="form-group">
      <input type="text" class="form-control" name="nom" placeholder="Nom du Site" require><label for="nom">.postwork.itinet.fr</label>
    </div>
    <button class="btn btn-default" type="submit" name="envoyer">Création</button>
  </form>
</div>
</body>
</html>
