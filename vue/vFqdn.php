<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    
        <link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.css">      
     <!--    <link rel="stylesheet" href=" vue/style.css">  -->
    
  </head>
  <body>
      <?php
    include_once("vNavco.php");
  ?>
    <div class="container">
      <h1> Creer votre FQDN</h1>   
      <form class="form" method="POST" role="form" action="?page=inscription">
        <input type="text" name="nom" placeholder="Nom de Machine/Utilisateur" required>.postwork.itinet.fr
        <input type="text" name="ip" placeholder="Adresse IP">
        <button type="submit" name="envoyer">S'enregistrer</button>
        <button type="submit" name="envoyer">Création</button>
      </form>
    </div>
      <?php
    include_once("vFooter.php");
  ?>
  </body>
</html>

