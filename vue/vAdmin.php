<!DOCTYPE html>
<html>
<head>
  <title>Postwork</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
 </head>
 <style>
 .main
{
  position:absolute;
  width: 700px ;
  height: 340px ;
  top:50%;
  left:55%;
  margin-top:-170px;
  margin-left:-350px;
}
.milieu {
  margin-top: 150px;
  margin-left: 200px;

}
.milieu2 {
  margin-top: 150px;
  margin-left: 200px;
}
  .couleur2 {
        background: #C4C3C3;
     }
</style>

 <body class="couleur2">
<?php
    include_once("vNav.php");
?>

<div class="col-sm-2 sidenav couleur2">
      <p><a href="#">Purge des logs</a></p>
      <p><a href="#">Suppression de compte</a></p>
      <p><a href="#">Archivage</a></p>
</div>
    <div class="container petit main">
      <div class="btn-group">
  <button class="btn btn-primary dropdown-toggle milieu " type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Gestion de services <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li>Mail</li>
    <li>FQDN</li>
    <li>BDD</li>
    <li>cloud</li>
  </ul>
</div>
<div class="btn-group">
  <button class="btn btn-primary dropdown-toggle milieu2" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Liste des utilisateurs <span class="caret"></span>
  </button>
  <ul class="dropdown-menu">
    <li>Mail</li>
    <li>FQDN</li>
    <li>BDD</li>
    <li>cloud</li>
  </ul>
</div>
<!--      <table class="table table-striped">
    <thead>
        <tr>
            <th>Services</th>
            <th>Reload</th>
            <th>Utilisateurs du services</th>

        </tr>
    </thead>

        <tr>
            <td>PwHost</td>
            <td>
              <button type="submit" class="btn btn-default">Reload</button>
            </td>
            <td><button type="submit" class="btn btn-default">Liste</button></td>
        </tr>
        <tr>
            <td>PwMail</td>
            <td><button type="submit" class="btn btn-default">Reload</button></td>
            <td><button type="submit" class="btn btn-default">Liste</button></td>
        </tr>
        <tr>
            <td>PwCloud</td>
            <td><button type="submit" class="btn btn-default">Reload</button></td>
            <td><button type="submit" class="btn btn-default">Liste</button></td>
        </tr>
        <tr>
            <td>PwName</td>
            <td><button type="submit" class="btn btn-default">Reload</button></td>
            <td><button type="submit" class="btn btn-default">Liste</button></td>
        </tr>
        <tr>
            <td>PwBDD</td>
            <td><button type="submit" class="btn btn-default">Reload</button></td>
            <td><button type="submit" class="btn btn-default">Liste</button></td>
        </tr>
          <tr>
            <td>PwChat</td>
            <td><button type="submit" class="btn btn-default">Reload</button></td>
            <td><button type="submit" class="btn btn-default">Liste</button></td>
        </tr>
</table> -->
</div>

 </body>
</html>