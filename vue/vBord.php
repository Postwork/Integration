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
      <p><a href="#">Acceder a sa boite mail</a></p>
      <p><a href="#">Acceder a son cloud</a></p>
      <p><a href="#">Créer votre nom de domaine</a></p>
      <p><a href="#">Heberger Une base de données</a></p>
      <p><a href="#">Heberger son site web</a></p>
      
    </div>
    <div class="col-sm-8 text-left"> 
      <h1>Bienvenue sur votre tableau de bord</h1>
      <p><strong>C'est ici que vous pourrez acceder aux differents services que Postwork vous propose</strong></p>
      <hr>
      <div class="container text-center">    
        <div class="row">
          <div class="col-xs-5 col-md-5 couleur">
            <p>Acces a son cloud</p>
            <img src="contenu/image/cloud.png" class="img-circle" alt="Cinque Terre" width="304" height="236">
          </div>
          <div class="col-xs-5 col-md-5 couleur"> 
            <p>Acces a sa BDD</p>
            <img src="contenu/image/rainloop.png" class="img-circle" alt="Cinque Terre" width="304" height="236">   
          </div>
          <div class="col-xs-5 col-md-5 couleur"> 
            <p>Acces a sa boite mail</p>
            <img src="contenu/image/cloud.png" class="img-rounded" alt="Cinque Terre" width="304" height="236">   
          </div>
          <div class="col-xs-4 col-md-5 couleur"> 
            <p>Créez une boite mail</p>
            <!-- <img src="contenu/image/cloud.png" class="img-rounded" width="304" height="236">    -->
          </div>
        </div>
      </div> 
    </div>
        <div class="col-sm-2 sidenav couleur2">
      <div class="well">
       <p><a href="#">Gérer son compte utilisateur</a></p>
      </div>
      <div class="well">
        <p><a href="#">Contactez nous</a></p>
      </div>
    </div>
  </div>
</div>

<?php
include_once("vFooter.php");
?>

</body>
</html>
