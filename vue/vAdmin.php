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

  .couleur2 {
        background: #C4C3C3;
     }
</style>

 <body class="couleur2">
<?php
    include_once("vNavco.php");
?>

<div class="col-sm-2 sidenav couleur2">
      <p><a href="#">Purge des logs</a></p>
      <p><a href="#">Suppression de compte</a></p>
      <p><a href="#">Archivage</a></p>
</div>
    <div class="container petit">
     <table class="table table-striped">
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

</div>

 </body>
</html>