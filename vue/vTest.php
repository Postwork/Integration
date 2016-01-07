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
      <form method="POST" action="?page=test">
        <td>  <input type="text" class="form-inline" name="nom" placeholder="Nom"> .postwork.itinet.fr </td>
        <td> <input type="text" class="form-inline" name="ip"></td>
        <td><button type="submit" name="envoyer" value="1">Créer </button></td>
      </form>
    </tr>
  </table>

  <h2>Portfolio</h2>

  <table class="table table-striped">

    <thead>
      <tr>
        <th>Etat du site</th>
        <th>FQDN</th>
        <th>IP</th>
        <th>BDD</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <?php 
    foreach ($portfolio as $p) {
      echo "
      <tr><td>";
      if ($p['StatusVhost'] == 1 xor $p['StatusExt'] == 1) {
        echo "
        <form method='POST' action='?page=test'>
        <input type='hidden' name='statussite' value='".$p['IdSite']."'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-danger glyphicon glyphicon-remove'>
        <input type='hidden' name='formulaire' value='activation'>
        </button>
        </form>
        ";
      } else {
        echo "
        <form method='POST' action='?page=test'>
        <input type='hidden' name='statussite' value='".$p['IdSite']."'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-success glyphicon glyphicon-ok'>
        <input type='hidden' name='formulaire' value='activation'>
        </button>
        </form>
        ";
      }
      echo "</td><td>
      ".$p['FQDN']."
      </td><td>
      ".$p['IP']."
      </td><td>";
       if ($p['StatusBDD'] == 1) {
        echo "
        <form method='POST' action='?page=test'>
        <input type='hidden' name='statusbdd' value='".$p['StatusBDD']."'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-unchecked'>
        <input type='hidden' name='formulaire' value='bdd'>
        </button>
        </form>
        ";
      } else {
        echo "
        <form method='POST' action='?page=test'>
        <input type='hidden' name='statusbdd' value='".$p['StatusBDD']."'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-check'>
        <input type='hidden' name='formulaire' value='bdd'>
        </button>
        </form>
        ";
      }
      echo "</td><td align= 'center'>
      <form method='POST' action='?page=modifier'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-cog'>
        </button>
        </form>
      </td><td align= 'center'>
     <form method='POST' action='?page=test'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-trash'>
        <input type='hidden' name='formulaire' value='supression'>
        </button>
        </form>
      </td>";
      echo "
      </tr>";
    }
    ?>

  </table>


  <h2>Projets</h2>
  <table class="table table-striped">

    <thead>
      <tr>
        <th>Etat du site</th>
        <th>FQDN</th>
        <th>IP</th>
        <th>BDD</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>

<?php
   foreach ($projet as $p) {
      echo "
      <tr><td>";
      if ($p['StatusVhost'] == 1 xor $p['StatusExt'] == 1) {
        echo "
        <form method='POST' action='?page=test'>
        <input type='hidden' name='statussite' value='".$p['IdSite']."'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-danger glyphicon glyphicon-remove'>
        <input type='hidden' name='formulaire' value='activation'>
        </button>
        </form>
        ";
      } else {
        echo "
        <form method='POST' action='?page=test'>
        <input type='hidden' name='statussite' value='".$p['IdSite']."'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-success glyphicon glyphicon-ok'>
        <input type='hidden' name='formulaire' value='activation'>
        </button>
        </form>
        ";
      }
      echo "</td><td>
      ".$p['FQDN']."
      </td><td>
      ".$p['IP']."
      </td><td>";
       if ($p['StatusBDD'] == 1) {
        echo "
        <form method='POST' action='?page=test'>
        <input type='hidden' name='statusbdd' value='".$p['StatusBDD']."'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-unchecked'>
        <input type='hidden' name='formulaire' value='bdd'>
        </button>
        </form>
        ";
      } else {
        echo "
        <form method='POST' action='?page=test'>
        <input type='hidden' name='statusbdd' value='".$p['StatusBDD']."'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-check'>
        <input type='hidden' name='formulaire' value='bdd'>
        </button>
        </form>
        ";
      }
      echo "</td><td align= 'center'>
      <form method='POST' action='?page=modifier'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-cog'>
        </button>
        </form>
      </td><td align= 'center'>
     <form method='POST' action='?page=test'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-trash'>
        <input type='hidden' name='formulaire' value='supression'>
        </button>
        </form>
      </td>";
      echo "
      </tr>";
    }
    ?>

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
