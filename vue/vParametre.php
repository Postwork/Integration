<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Parametre</title>

  <link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.css">      
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="vue/contenu/bootstrap/js/bootstrap.min.js"></script>

</head>
<body>
  <?php
  include_once("vNavco.php");
  ?>

  <div class="container">
    <h1>Paramètres personnels</h1>
    <?php fErreur(); ?>

    <?php
    if (isset($prenom)) {
      echo '
      <dl class="dl-horizontal">
      <dt>Prénom :</dt>
      <dd>
      '.$prenom.'
      </dd>
      <dt>Nom :</dt>
      <dd>
      '.$nom.'
      </dd>
      <dt>Date de naissance :</dt>
      <dd>
      '.$datedenaissance.'
      </dd>
      <dt>Email Secondaire :</dt>
      <dd>
      '.$email.'
      </dd>
      </dl>';
    } else {
      echo '
      <form class="form-horizontal" role="form" method="POST" action="?page=parametre">
      <div class="form-group">
      <label class="control-label col-sm-2" for="prenom">Prénom* :</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="prenom" placeholder="Entrer prénom" required="">
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="nom">Nom* :</label>
      <div class="col-sm-10">
      <input type="text" class="form-control" name="nom" placeholder="Entrer nom" required="">
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="datedenaissance">Date de naissance* :</label>
      <div class="col-sm-10">
      <input type="date" class="form-control" name="datedenaissance" placeholder="jj/mm/aaaa" required="">
      </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email Secondaire* :</label>
      <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="Enter email" required="">
      </div>
      </div>
      <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        *Obligatoire
      </div>
      </div>
      <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="envoyer">Valider</button>
      <input type="hidden" name="formulaire" value="1">
      </div>
      </div>
      </form>
      ';
    }
    ?>
    <div class="h2">Changer de mot de passe</div>
    <form class="form-horizontal" method="POST" action="?page=parametre">
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">Mot de passe actuel*:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="motdepasse">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Nouveau mot de passe* :</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="nouveau">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Confirmation* :</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="nouveau2">
        </div>
      </div>
      <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        *Obligatoire
      </div>
      </div>
      <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="envoyer">Changer</button>
      <input type='hidden' name='formulaire' value='2'>
      </div>
      </div>
    </form>
  </div>
  </div>

  <?php
  include_once("vFooter.php");
  ?>


</body>
</html>