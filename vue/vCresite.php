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
    <div class="container petit">
      <h1> Creer votre site</h1> 
      <br>    
      <form class="form" method="POST" role="form" action="?page=inscription">
        <input type="text" name="nom" placeholder="Nom du site" required>.postwork.itinet.fr
        <br>
         <br>
        <button type="submit" name="envoyer">Création</button>
      </form>
    </div>
      <?php
    include_once("vFooter.php");
  ?>
  </body>
</html> 