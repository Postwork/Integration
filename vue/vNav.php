
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>                        
    </button>
  </div>
  <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php?page=index">Accueil</a></li>
      <li><a href="?page=sites">Tableau de bord</a></li>
      <form class="navbar-form navbar-left" role="search" action="index.php?page=recherche">
        <div class="form-group">
          <input type="text" class="form-control" name="recherche" placeholder="Search">
        </div>
        <a href="index.php?page=recherche"> <button type="submit" name="envoyer" class="btn btn-default ">Recherche</button> </a>
      </form>
    </ul>
    <ul class="nav navbar-nav">
      <li> <a href="http://mail.postwork.itinet.fr/" target="_blank"> <span class="glyphicon glyphicon-envelope"> </span> PwMail </a> </li>
      <li><a href="https://cloud.postwork.itinet.fr/" target="_blank"> <span class="glyphicon glyphicon-cloud"></span> PwCloud </a> </li>
      <li><a href="http://bdd.postwork.itinet.fr/" target="_blank"> <span class="glyphicon glyphicon-th-list"></span> PwBdd </a></li>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <li><a href="index.php?page=parametre"><span class="glyphicon glyphicon-cog"></span> Paramètres utilisateurs</a></li>
      <li><a href="index.php?page=deconnexion"><span class="glyphicon glyphicon-log-out"></span> Se deconnecter</a></li>
    </ul>
  </div>
</div>
</nav>
