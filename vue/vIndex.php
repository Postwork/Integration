
<!DOCTYPE html>
<html>
<head>
  <title>Postwork</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
  <style>
  /* Remove the navbar's default margin-bottom and rounded borders */ 
  .navbar {
    margin-bottom: 0;
    border-radius: 0;
  }

  /* Add a gray background color and some padding to the footer */
  footer {
    background-color: #f2f2f2;
    padding: 25px;
  }

  .carousel-inner img {
    width: 100%; /* Set width to 100% */
    margin: auto;
    min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  .services {
    padding-top: 1px;
  }
  html, body {
    height: 100%;
  }
  #headerwrap {

    height: calc(100% - 50px );
    border: 1px solid grey;
  }
  .fond {
    margin: auto;
  }
  .titre {
    margin-bottom: 100px;
  }
  .couleur {
   background: #329BDC;
 }
 .txt_darkgrey {
  color: #333333;
}

.txt_bleu {
  color: #2C7FD8;
}
.txt_slogan {
  font-size:14px; 
  color:#929292;
}
.foot {
  background: #090707;
}
.couleur2 {
  background: #C4C3C3;
}

</style>
</head>
<body>

<?php
  include_once("vNavco.php");
  ?>

  <div id="headerwrap" >
   <img src="vue/contenu/image/BigLogoV2.png" class="img-responsive fond"> 

 </div>


 <div class="templatemo-service titre" >
  <div class="templatemo-slogan text-center titre">
    <h1> <span class="txt_darkgrey">Ce que </span><span class="txt_bleu">Postwork </span><span class="txt_darkgrey">vous propose</span>
      <br>
      <br>
      <p class="txt_slogan"><i>Postwork vous permet de poster vos portefolio et projet personnel afin de vous mettre en relation avec des entreprise qui souhaite embaucher de jeunes diplômés </i></p> </h1>
    </div>  
    <!-- <h1 class="text-center titre"> Ce que nous vous proposons </h1> -->
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="templatemo-service-item">
            <div>
              <img src="vue/contenu/image/host.png" alt="icon" />
              <span class="templatemo-service-item-header">PwHost</span>
            </div>
            <p>PwHost est le service qui vous permet de vous donner accès a un serveur web (NGINX) ainsi qu'un transfert de fichier securisé grace MysecureShell.</p>
            <div class="text-center">
              <a href="#" 
              class="templatemo-btn-read-more btn btn-orange"> Plus d'information</a>
            </div>
            <br class="clearfix"/>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="col-md-4">
          <div class="templatemo-service-item" >
            <div>
              <img src="vue/contenu/image/donnée.png" alt="icon"/>
              <span class="templatemo-service-item-header">PwBdd</span>
            </div>
            <p>Administrez vos bases de données comme vous le souhaitez avec une interface web grâce a MYSQL et PhpMyAdmin!</p>
            <div class="text-center">
              <a href="#" 
              class="templatemo-btn-read-more btn btn-orange">Plus d'information</a>
            </div>
            <br class="clearfix"/>
          </div>

        </div>

        <div class="col-md-4">
          <div class="templatemo-service-item">
            <div>
              <img src="vue/contenu/image/name.png" alt="icon"/>
              <span class="templatemo-service-item-header">PwName</span>
            </div>
            <p>Cette fonctionnalité vous permettera de créer un FQDN pour vos sites et projets. Un Qrcode sera automatiquement pour chaque site!</p>
            <div class="text-center">
              <a href="#" 
              class="templatemo-btn-read-more btn btn-orange">Plus d'information</a>
            </div>
            <br class="clearfix"/>
          </div>
          <br class="clearfix"/>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="templatemo-service-item">
            <div>
              <img src="vue/contenu/image/mail.png" alt="icon" />
              <span class="templatemo-service-item-header">PwMail</span>
            </div>
            <p>Vous ne voulez pas utiliser votre boite mail personnel pour les contacts entreprise? Pas de problème, nous vous en créons une dès votre inscription!</p>
            <div class="text-center">
              <a href="#" 
              class="templatemo-btn-read-more btn btn-orange"> Plus d'information</a>
            </div>
            <br class="clearfix"/>
          </div>
          <div class="clearfix"></div>
        </div>

        <div class="col-md-4">
          <div class="templatemo-service-item" >
            <div>
              <img src="vue/contenu/image/chat.png" alt="icon"/>
              <span class="templatemo-service-item-header">PwChat</span>
            </div>
            <p>Postwork vous permet d'avoir une recherche d'emploi plus active avec notre service tchat, vous pourrez prendre contact avec des entreprises directement depuis notre site. </p>
            <div class="text-center">
              <a href="#" 
              class="templatemo-btn-read-more btn btn-orange">Plus d'information</a>
            </div>
            <br class="clearfix"/>
          </div>

        </div>

        <div class="col-md-4">
          <div class="templatemo-service-item">
            <div>
              <img src="vue/contenu/image/cloud.png" alt="icon"/>
              <span class="templatemo-service-item-header">PwCloud</span>
            </div>
            <p>PwCloud vous permet d'avoir accès a un cloud exclusivement pour vos travaux si vous le souhaitez. Jusqu'a 5Go de stockage!</p>
            <div class="text-center">
              <a href="#" 
              class="templatemo-btn-read-more btn btn-orange">Plus d'information</a>
            </div>
            <br class="clearfix"/>
          </div>
          <br class="clearfix"/>
        </div>
      </div>
    </div>
  </div>
</body>
<?php
  include_once("vFooter.php");
  ?>

</html>


  