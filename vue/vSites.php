<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Tableau de bord</title>
  <link rel="stylesheet" href="vue/contenu/bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="vue/contenu/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  include_once("vNav.php");
  ?>
  <div class="container">
          <h1>Tableau de bord</h1> 
          <?php fErreur(); ?>
    <table class="table">
      <tr><td colspan="6"><div class="h2">Mail</div></td></tr>

      <?php

      echo "
        <tr class='active'><td colspan='1'>
        <form method='POST' action='?page=sites'>";
        if ($mail == 1) {
          echo "
          <input type='hidden' name='statusmail' value='0'>
          <button type='submit' name='envoyer' class='btn btn-danger glyphicon glyphicon-remove'>
          <input type='hidden' name='formulaire' value='mail'>
          ";
        } elseif ($mail == 0) {
          echo "
          <input type='hidden' name='statusmail' value='1'>
          <button type='submit' name='envoyer' class='btn btn-success glyphicon glyphicon-ok'>
          <input type='hidden' name='formulaire' value='mail'>
          ";
        } else {
          echo "
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
          ";
        }
        echo "</button></td><td colspan='5'>".$pseudo.$globals["mailpostwork"]."</form></td></tr>";
      ?>

      <tr>
        <td colspan="6">
          <div class="h2">Portfolio</div>
        </td>
      </tr>

      <!-- <thead> -->
      <tr>
        <td><div class="h4">Etat</div></td>
        <td><div class="h4">FQDN</div></td>
        <td><div class="h4">IP</div></td>
        <td><div class="h4">BDD</div></td>
        <td align="center"><div class="h4">Modifier</div></td>
        <td align="center"><div class="h4">Supprimer</div></td>
      </tr>
      <!-- </thead> -->
      <?php 
      foreach ($portfolio as $p) {
        echo "
        <tr class='info'><td>";
        if ($p['StatusVhost'] == 1) {
          echo "
          <form method='POST' action='?page=sites'>
          <input type='hidden' name='statussite' value='0'>
          <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-danger glyphicon glyphicon-remove'>
          <input type='hidden' name='formulaire' value='activation'>
          </button>
          </form>
          ";
        } elseif ($p['StatusVhost'] == 0) {
          echo "
          <form method='POST' action='?page=sites'>
          <input type='hidden' name='statussite' value='1'>
          <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-success glyphicon glyphicon-ok'>
          <input type='hidden' name='formulaire' value='activation'>
          </button>
          </form>
          ";
        } else {
          echo "
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
          ";
        }
        echo "</td><td>".htmlentities(substr($p['FQDN'], 0, -19))."
        </td><td>".htmlentities($p['IP'])."
        </td><td>";
        if ($p['StatusBDD'] == 1) {
          echo "
          <form method='POST' action='?page=sites'>
          <input type='hidden' name='statusbdd' value='0'>
          <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-check'>
          <input type='hidden' name='formulaire' value='bdd'>
          </button>
          </form>
          ";
        } elseif ($p['StatusBDD'] == 0) {
          echo "
          <form method='POST' action='?page=sites'>
          <input type='hidden' name='statusbdd' value='1'>
          <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-unchecked'>
          <input type='hidden' name='formulaire' value='bdd'>
          </button>
          </form>
          ";
        } else {
          echo "
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
          ";
        }
        echo "</td><td align= 'center'>
        <form method='POST' action='?page=modifier'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-cog'>
        </button>
        </form>
        </td><td align= 'center'>
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
          </button>
        </td>";
        echo "
        </tr>";
      }
      ?>

      <tr>
        <td colspan="6">
          <div class="h2">Projets
            <button type="button" class="btn btn-primary glyphicon glyphicon-plus" data-toggle="collapse" data-target="#projet"></button>
          </div>
          <div id="projet" class="collapse">
            <form method="POST" action="?page=sites">
              <input type="text" class="form-inline" name="nom" placeholder="nom"><label>.postwork.itinet.fr</label>
              <button type="submit" name="envoyer" class='btn btn-default' >Créer</button>
              <input type='hidden' name='formulaire' value='création'>
            </form>
          </div>
        </td>
      </tr>

      <?php
      foreach ($projet as $p) {
        echo "
        <tr class='active'><td>";
        if ($p['StatusVhost'] == 1) {
          echo "
          <form method='POST' action='?page=sites'>
          <input type='hidden' name='statussite' value='0'>
          <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-danger glyphicon glyphicon-remove'>
          <input type='hidden' name='formulaire' value='activation'>
          </button>
          </form>
          ";
        } elseif ($p['StatusVhost'] == 0) {
          echo "
          <form method='POST' action='?page=sites'>
          <input type='hidden' name='statussite' value='1'>
          <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-success glyphicon glyphicon-ok'>
          <input type='hidden' name='formulaire' value='activation'>
          </button>
          </form>
          ";
        } else {
          echo "
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
          ";
        }
        echo "</td><td>".htmlentities(substr($p['FQDN'], 0, -19))."
        </td><td>".htmlentities($p['IP'])."
        </td><td>";
        if ($p['StatusBDD'] == 1) {
          echo "
          <form method='POST' action='?page=sites'>
          <input type='hidden' name='statusbdd' value='0'>
          <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-check'>
          <input type='hidden' name='formulaire' value='bdd'>
          </button>
          </form>
          ";
        } elseif ($p['StatusBDD'] == 0) {
          echo "
          <form method='POST' action='?page=sites'>
          <input type='hidden' name='statusbdd' value='1'>
          <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-unchecked'>
          <input type='hidden' name='formulaire' value='bdd'>
          </button>
          </form>
          ";
        } else {
          echo "
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
          ";
        }
        echo "</td><td align= 'center'>
        <form method='POST' action='?page=modifier'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-cog'>
        </button>
        </form>
        </td><td align= 'center'>
        <form method='POST' action='?page=sites'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-trash'>
        <input type='hidden' name='formulaire' value='suppression'>
        <input type='hidden' name='site' value='".$p['IdSite']."'>
        </button>
        </form>
        </td>";
        echo "
        </tr>";
      }
      ?>

      <tr>
        <td colspan="6">
          <div class="h2">FQDN
            <button type="button" class="btn btn-primary glyphicon glyphicon-plus" data-toggle="collapse" data-target="#fqdn"></button>
          </div>
          <div id="fqdn" class="collapse">
            <form method="POST" action="?page=sites">
              <input type="text" class="form-inline" name="nom" placeholder="nom"><label>.postwork.itinet.fr </label>
              <input type="text" class="form-inline" name="ip" placeholder="Adresse IP">
              <button type="submit" name="envoyer" class='btn btn-default' >Créer</button>
              <input type='hidden' name='formulaire' value='création'>
            </form>
          </div>
        </td>
      </tr>

      <?php
      foreach ($fqdn as $p) {
        echo "
        <tr class='active'><td>";
        if ($p['StatusVhost'] == 1) {
          echo "
          <form method='POST' action='?page=sites'>
          <input type='hidden' name='statussite' value='0'>
          <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-danger glyphicon glyphicon-remove'>
          <input type='hidden' name='formulaire' value='activation'>
          </button>
          </form>
          ";
        } elseif ($p['StatusVhost'] == 0) {
          echo "
          <form method='POST' action='?page=sites'>
          <input type='hidden' name='statussite' value='1'>
          <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-success glyphicon glyphicon-ok'>
          <input type='hidden' name='formulaire' value='activation'>
          </button>
          </form>
          ";
        } else {
          echo "
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
          ";
        }
        echo "</td><td>".htmlentities(substr($p['FQDN'], 0, -19))."
        </td><td>".htmlentities($p['IP'])."
        </td><td>
        <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
        </td><td align= 'center'>
        <form method='POST' action='?page=modifier'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-cog'>
        </button>
        </form>
        </td><td align= 'center'>
        <form method='POST' action='?page=sites'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-trash'>
        <input type='hidden' name='formulaire' value='suppression'>
        <input type='hidden' name='site' value='".$p['IdSite']."'>
        </button>
        </form>
        </td>
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