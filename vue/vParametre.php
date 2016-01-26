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
  include_once("vNav.php");
  ?>

  <div class="container">
    <h1>Paramètres personnels</h1>
    <?php fErreur(); ?>

    <table class=" table table-striped">
      <tr>
        <form class="form-inline" method="POST"  action="?page=parametre">
          <input type="hidden" name="formulaire" value="prenom">
          <td align="right"><label for="Prenom">Prénom</label></td>
          <td></td>
          <td><input type="text" class="form-inline" name="prenom" <?php echo "value ='".$prenom."'";?>></td>
          <td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
        </form>
      </tr>
      <tr>
        <form class="form-inline" method="POST"  action="?page=parametre">
          <input type="hidden" name="formulaire" value="nom">
          <td align="right"><label for="Nom">Nom</label></td>
          <td></td>
          <td><input type="text" class="form-inline" name="nom" <?php echo "value ='".$nom."'";?>></td>
          <td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
        </form>
      </tr>
      <tr>
        <form class="form-inline" method="POST"  action="?page=parametre">
          <input type="hidden" name="formulaire" value="datedenaissance">
          <td align="right"><label for="Date de naissance">Date de Naissance</label></td>
          <td></td>
          <td><input type="date" class="form-inline" placeholder="jj/mm/aaaa" name="datedenaissance" <?php echo "value ='".$datedenaissance."'";?>></td>
          <td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
        </form>
      </tr>
      <tr>
        <form class="form-inline" method="POST"  action="?page=parametre">
          <input type="hidden" name="formulaire" value="email">
          <td align="right"><label for="email">Adresse Mail</label></td>
          <td></td>
          <td><input type="text" class="form-inline" name="email" <?php echo "value ='".$email."'";?>></td>
          <td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
        </form>
      </tr>
    </table>

    <div class="h2">Changer mot de passe</div>
    <form class="form-inline" method="POST"  action="?page=parametre">
      <input type="hidden" name="formulaire" value="motdepasse">
      <table class=" table table-striped">
        <tr>
          <td align="right"><label for="Mot de passe">Mot de passe actuel*</label></td>
          <td></td>
          <td><input type="password" class="form-inline" name="motdepasse" required></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td align="right"><label for="Nouveau mot de passe">Nouveau mot de passe*</label></td>
          <td></td>
          <td><input type="password" class="form-inline" name="nouveau" required></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td align="right"><label for="Nouveau mot de passe">Confirmation*</label></td>
          <td></td>
          <td><input type="password" class="form-inline" name="nouveau2" required></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td>
            <div class="form-group">*Obligatoire</div>
            <button type="submit" class="btn btn-default" name="envoyer">Changer</button>
            <input type='hidden' name='formulaire' value='2'>
          </td>
          <td></td>
          <td></td>
        </tr>
      </table>
    </form>

    <?php
    if (isset($prenom)) {
      echo '
      <dl class="dl-horizontal">
      <dt>Prénom :</dt>
      <dd>
      '.htmlentities($prenom).'
      </dd>
      <dt>Nom :</dt>
      <dd>
      '.htmlentities($nom).'
      </dd>
      <dt>Date de naissance :</dt>
      <dd>
      '.htmlentities($datedenaissance).'
      </dd>
      <dt>Mail Secondaire :</dt>
      <dd>
      '.htmlentities($email).'
      </dd>
      </dl>
      <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#mail">Modifier mail</button>
      <div id="mail" class="collapse">
      <form method="POST" action="?page=parametre">
      <input type="email" class="form-inline" name="email">
      <button type="submit" name="envoyer" class="btn btn-default" >Modifier</button>
      <input type="hidden" name="formulaire" value="3">
      </form>
      </div>
      ';

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

    <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#supprimer">Supprimer compte</button>
    <div id="supprimer" class="collapse">
      <form method="POST" action="?page=parametre">
        <div class="form-group">
          <label class="control-label col-sm-2" for="mot de pase">Mot de passe actuel*:</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="motdepasse">
          </div>
        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="envoyer" class="btn btn-default" >Supprimer</button>
            <input type="hidden" name="formulaire" value="4">
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