<!DOCTYPE html>
<html>
<head>
  <title>Postwork</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="style.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> <style>


    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>

  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
      .couleur {
         background: #329BDC;
      }
      .couleur2 {
        background: #C4C3C3;
      }
      .foot {
        background: #090707;
      }

  </style>

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
        <li class="active"> <a href="#"><?php echo $_SESSION['Prenom']; ?></a> </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid text-center couleur2">    
  <div class="row content">
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
            <img src="contenu/image/cloud.png" class="img-rounded" width="304" height="236">   
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

<footer class="container-fluid text-center foot">
  
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-6 col-sm-3 column">
                    <h4>En savoir plus sur l'équipe</h4>
                    
                      <a href="">Postwork</a>
                      <br>
                      <a href="http://www.intechinfo.fr">Notre formation</a>  
                </div>

                <div class="col-xs-6 col-sm-3 column">
                  <h4>Les membres de l'équipe </h4>
                  <a href="http://www.intechinfo.fr">Chef de projet: Freddy Hauteville</a>
                  <br>
                  <a href="http://www.intechinfo.fr">Membre: Jean-Christophe Thiburce</a>
                  <br>
                  <a href="http://www.intechinfo.fr">Membre: Bastian Bel-Ange</a>
                </div>
                <div class="col-xs-6 col-sm-3 column">
                </div>
                <div class="col-xs-12 col-sm-3 text-right">
                    
                </div>
            </div>
            <br/>
            <span class="pull-right text-muted small">Postwork ©2015 </span>
        </div>


</footer>

</body>
</html>
