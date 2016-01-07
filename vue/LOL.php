<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    
        <link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.css">      
       <!--  <link rel="stylesheet" href=" vue/style.css">  -->
    
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
          <td>  <input type="text" class="form-inline" id="FQDN"> .postwork.itinet.fr </td>
          <td> <input type="text" class="form-inline" id="IP"></td>

          <td><button type="submit" name="envoyer">Créer </button></td>
        </tr>
      </table>


    <h2>Portfolio</h2>
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
        <td> <button type="submit" name="envoyer">Envoyer</button> </td>

</table>
    </div>
      <?php
    include_once("vFooter.php");
  ?>
  </body>
</html>