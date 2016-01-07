<html>
<head>
	<title></title>



  <link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.min.css"> 
  <link rel="stylesheet" href=" vue/contenu/style.css"> 




  <style type="text/css">



  </style>
</head>

<body>
  <?php
  if (isset($_POST['deconnecter'])) {
    unset($_SESSION['IdUtilisateur']);
  }
  session_start();
  if (!empty($_GET['page']) AND is_file('controleur/'.$_GET['page'].'.php')) {
    include('controleur/'.$_GET['page'].'.php');
  }
  else {
    include('controleur/index.php');
  }
  ?>
<!-- 
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
                  <a href="http://www.intechinfo.fr"> <strong>Freddy Hauteville</strong></a>
                  <br>
                  <a href="http://www.intechinfo.fr">Jean-Christophe Thiburce</a>
                  <br>
                  <a href="http://www.intechinfo.fr">Bastian Bel-Ange</a>
                </div>
                <div class="col-xs-6 col-sm-3 column">
                </div>
                <div class="col-xs-12 col-sm-3 text-right">
                    
                </div>
            </div>
            <br/>
            <span class="pull-right text-muted small">Postwork ©2015 </span>
        </div>


      </footer> -->



    </body>
    </html>
