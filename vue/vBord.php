<!DOCTYPE html>
<html>
<head>
  <title>Postwork</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.min.css">   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> <style>

  <style >
    /* Remove the navbar's default margin-bottom and rounded borders */ 

  .navbar {
    margin-bottom: 0;
    border-radius: 0;
  }

  /* Add a gray background color and some padding to the footer */
  footer {
    background-color: #090707;
  }
/* Hide the carousel text when the screen is less than 600 pixels wide */

.foot {
  background: #090707;
}


  </style>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Projects</a></li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"> <a href="#"> Nom d'utilisateur </a> </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center couleur2">    
  <div class="row content petit">
    <div class="col-sm-2 sidenav couleur2">
      <p><a href="index.php?page=cresite">Créer un site </a></p>
      <p><a href="index.php?page=sites">Voir l'état de ses sites</a></p>
      <p><a href="index.php?page=mail">Etat de sa boite mail</a></p>
      <p><a href="index.php?page=fqdn">Creer un FQDN</a></p>
      <p><a href="index.php?page=delfqdn">Supprimer un FQDN</a></p>
      
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Bienvenue sur votre tableau de bord</h1>
      <p><strong>C'est ici que vous pourrez acceder aux differents services que Postwork vous propose</strong></p>
      <hr>
      <div class="container text-center">    
        <div class="row">
          <div class="col-xs-5 col-md-5 couleur">
            <a href="http://mail.postwork.itinet.fr/"> <p>Acces a sa boite mail</p> </a>
             <img src="vue/contenu/image/e-mail.png" class="img-rounded" alt="Cinque Terre" width="304" height="236">
          </div>
          <div class="col-xs-5 col-md-5 couleur"> 
            <a href="http://bdd.postwork.itinet.fr/"> <p>Acces a sa BDD</p> </a>
             <img src="vue/contenu/image/basededonnée.png" class="img-rounded" alt="Cinque Terre" width="304" height="236">   
          </div>
          <div class="col-xs-10 col-md-10 couleur"> 
             <a href="http://cloud.postwork.itinet.fr/"> <p>Acces a son cloud</p> </a> 
             <img src="vue/contenu/image/nuage.png" class="img-rounded" alt="Cinque Terre" width="304" height="236">
          </div>
        </div>
      </div> 
    </div>
        <div class="col-sm-2 sidenav couleur2">
      <div class="well">
       <p><a href="index.php?page=Putilisateur">Gérer son compte utilisateur</a></p>
      </div>
      <div class="well">
        <p> <a href="#"> Contactez nous </a> </p>
      </div>
    </div>
  </div>
</div>

<?php
include_once("vFooter.php");
?>

</body>
</html>
