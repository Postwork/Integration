<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    
        <link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.css">      
       <!--  <link rel="stylesheet" href=" vue/style.css">  -->
    
  </head>
  <body>
      <?php
    include_once("vNavco.php");
  ?>
    <div class="container">
      <h1> Activer ou desactiver ses sites</h1> 
      </br>  
     <table class="table table-striped">
    <thead>
        <tr>
            <th>Etat du site</th>
            <th>FQDN</th>
            <th>IP</th>
            <th>BDD</th>
            <th>Suppression du site</th>
            <th></th>
        </tr>
    </thead>
    <body>
  <?php
 //     foreach($news as $n)
 //     {
 //         echo '
 //         <tr>
 //            <td> 
 //              <input type="checkbox" name="lien1" value="nom du lien"  font-weight:bold"onclick" checked>
 //               activé
 //            </td>
 //           <td>
 //            .$LOL['nom']
 //           </td>
 //           <td> 
 //             .$LOL['IP']
 //           </td>
 //           <td>
 //             <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked> active
 //           </td>
 //           <td>
 //             .$LOL
 //           </td>
 //           <td>
 //             .$nom
 //           </td>
 //           <td><button type="submit" name="envoyer">supprimer</button></td>
 //           <td> <input type="button" name="lien1" value="nom du lien" onclick="self.location.href='page=$'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick>
 //         </tr>'
 // }

?>

        <tr>
            <td> 
              <input type="checkbox" name="lien1" value="nom du lien"  font-weight:bold"onclick" checked>
               activé
            </td>
            <td>John</td>
            <td>Carter</td>
            <td>Carter</td>
            <td><button type="submit" name="envoyer">supprimer</button></td>
        </tr>
        <tr>
            <td> 
              <input type="checkbox" name="lien1" value="nom du lien" font-weight:bold"onclick" checked>
               activé
            </td>
            <td>John</td>
            <td>Carter</td>
            <td>Carter</td>
            <td><button type="submit" name="envoyer">supprimer</button></td>
        </tr>
        <tr>
            <td> 
              <input type="checkbox" name="lien1" value="nom du lien" font-weight:bold"onclick" checked>
               activé
            </td>
            <td>John</td>
            <td>Carter</td>
            <td>Carter</td>
            <td><button type="submit" name="envoyer">supprimer</button></td>
        </tr>
        <td> <button type="submit" name="envoyer">Envoyer</button> </td>
    </body>
</table>
    </div>
      <?php
    include_once("vFooter.php");
  ?>
  </body>
</html>