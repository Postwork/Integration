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
    <div class="container petit">
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
        </tr>
    </thead>
    
  <?php
     // foreach($StatusBDD == 1) 
        //  //sites actifs
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
 //             <input type="checkbox" name="lien1" value="nom du lien"  font-weight:bold"onclick" checked> .$LOL['BDD'] 
 //           </td>
 //           <td>
 //             .$nom
 //           </td>
 //           <td><button type="submit" name="envoyer">supprimer</button></td>
 //           <td> <input type="button" name="lien1" value="nom du lien" onclick="self.location.href='page=$'" style="background-color:#3cb371" style="color:white; font-weight:bold"onclick>
 //         </tr>'
 // }


 // foreach($news == 2)
  // // sites desactivé
 //     {
 //         echo '
 //         <tr>
 //            <td> 
 //              <input type="checkbox" name="lien1" value="nom du lien"  font-weight:bold"onclick">
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
 //             <input type="checkbox" name="lien1" value="nom du lien"  font-weight:bold"onclick"> .$LOL['BDD'] 
 //           </td>
 //           <td>
 //             .$nom
 //           </td>
 //           <td> <button type="submit" name="envoyer">supprimer</button></td>
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
            <td> 
              <input type="checkbox" name="lien1" value="nom du lien"  font-weight:bold"onclick" checked> base
            </td>
            <td><button type="submit" name="envoyer">supprimer</button></td>
        </tr>
        <tr>
            <td> 
              <input type="checkbox" name="lien1" value="nom du lien" font-weight:bold"onclick" checked>
               activé
            </td>
            <td>toto</td>
            <td>Corto</td>
            <td>
              <input type="checkbox" name="lien1" value="nom du lien"  font-weight:bold"onclick" checked> base2
            </td>
            <td><button type="submit" name="envoyer">supprimer</button></td>
        </tr>
        <tr>
            <td> 
              <input type="checkbox" name="lien1" value="nom du lien" font-weight:bold"onclick" checked>
               activé
            </td>
            <td>Jean</td>
            <td>Perre</td>
            <td> 
             <input type="checkbox" name="lien1" value="nom du lien"  font-weight:bold"onclick" checked> Base3 
            </td>
            <td><button type="submit" name="envoyer">supprimer</button></td>
        </tr>
        <td> <button type="submit" name="envoyer">Envoyer</button> </td>

</table>
    </div>
      <?php
    include_once("vFooter.php");
  ?>
  </body>
</html>