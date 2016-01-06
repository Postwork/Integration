<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sites</title>
  <link rel="stylesheet" href="vue/contenu/bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="vue/contenu/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  include_once("vNav.php");
  ?>
  <div class="container">
    <!--       <h1> Activer ou desactiver ses sites</h1>  -->

    <!-- <div class="h2">Création</div> -->
    <table class="table">
      <tr><td colspan="6"><div class="h2">Création</div></td></tr>
      <tr align="center">
        <form method="POST" action="?page=sites">
          <td  colspan="6">
            <label><input type="text" class="form-inline" name="nom" placeholder="nom">.postwork.itinet.fr</label>
            <button type="submit" name="envoyer" class='btn btn-primary glyphicon glyphicon-plus' ></button><br>
            <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#ipinput">Hébergement externe ?</button>
            <div id="ipinput" class="collapse">
              <br>
              <input type="text" class="form-inline" name="ip" placeholder="Adresse IP">
            </div>
            <input type='hidden' name='formulaire' value='création'>
          </td>
        </form>
      </tr>
      <!-- tr align="center">
        <form method="POST" action="?page=sites">
          <td  colspan="6">
            <label><input type="text" class="form-inline" name="nom" placeholder="nom">.postwork.itinet.fr</label>
            <button type="submit" name="envoyer" class='btn btn-primary glyphicon glyphicon-plus' ></button>
          </td>
        </form>
      </tr> -->
      <!-- </table> -->


      <!-- <table class="table"> -->
      <tr><td colspan="6"><div class="h2">Portfolio</div></td></tr>

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
          <form method='POST' action='?page=sites'>
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
          </button>
          </form>
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
          <form method='POST' action='?page=sites'>
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
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
        <form method='POST' action='?page=sites'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-trash'>
        <input type='hidden' name='formulaire' value='suppr'>
        <input type='hidden' name='site' value='".$p['IdSite']."'>
        </button>
        </form>
        </td>";
        echo "
        </tr>";
      }
      ?>

      <tr><td colspan="6"><div class="h2">Projets</div></td></tr>

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
          <form method='POST' action='?page=sites'>
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
          </button>
          </form>
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
          <form method='POST' action='?page=sites'>
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
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
        <form method='POST' action='?page=sites'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-trash'>
        <input type='hidden' name='formulaire' value='supression'>
        <input type='hidden' name='site' value='".$p['IdSite']."'>
        </button>
        </form>
        </td>";
        echo "
        </tr>";
      }
      ?>

      <tr><td colspan="6"><div class="h2">FQDN</div></td></tr>

      <?php
      foreach ($fqdn as $p) {
        echo "
        <tr class='active'><td>";
        if ($p['StatusExt'] == 1) {
          echo "
          <form method='POST' action='?page=sites'>
          <input type='hidden' name='statussite' value='0'>
          <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-danger glyphicon glyphicon-remove'>
          <input type='hidden' name='formulaire' value='activation'>
          </button>
          </form>
          ";
        } elseif ($p['StatusExt'] == 0) {
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
          <form method='POST' action='?page=sites'>
          <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
          </button>
          </form>
          ";
        }
        echo "</td><td>".htmlentities(substr($p['FQDN'], 0, -19))."
        </td><td>".htmlentities($p['IP'])."
        </td><td>
        <form method='POST' action='?page=sites'>
        <button type='submit' name='envoyer' class='btn glyphicon glyphicon-ban-circle' disabled>
        </button>
        </form>
        ";
        echo "</td><td align= 'center'>
        <form method='POST' action='?page=modifier'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-cog'>
        </button>
        </form>
        </td><td align= 'center'>
        <form method='POST' action='?page=sites'>
        <button type='submit' name='envoyer' value='".$p['IdSite']."' class='btn btn-default glyphicon glyphicon-trash'>
        <input type='hidden' name='formulaire' value='supression'>
        <input type='hidden' name='site' value='".$p['IdSite']."'>
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