<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    
        <link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.css">      
       <!--  <link rel="stylesheet" href=" vue/style.css">  -->
       <style>
  .petit {
    min-height: calc(100% - 270px);
  }
</style>
    
  </head>
  <body>
      <?php
    include_once("vNavco.php");
  ?>

<!--
<?php
  // foreach($ )
  //   echo '<tr>
  //           <td> FQDN </td>
  //           <td>192.168.0.1</td>
  //           <td><button type="submit" name="envoyer">supprimer</button></td>
  //       </tr>'
?> -->
    <div class="container petit">
      <h1> Supprimer un FQDN</h1> 
      </br>  
     <table class="table table-striped">
    <thead>
        <tr>
            <th>FQDN</th>
            <th>IP</th>
            <th></th>
        </tr>
    </thead>
          <tr>
            <td> FQDN </td>
            <td>192.168.0.1</td>
            <td><button type="submit" name="envoyer">supprimer</button></td>
        </tr>
        <td> <button type="submit" name="envoyer">Envoyer</button> </td>
    </body>
</table>
</div>
    </div>
      <?php
    include_once("vFooter.php");
  ?>
  </body>
</html>