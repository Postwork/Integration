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
  <div class="container petit">
    <h1> Activer ou desactiver sa boite mail</h1>   
  </br>
  <form class="form" action="?page=inscription">
    <b> état de la boite: </b> 
    <label class="radio-inline">
      <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"
      <?php
      //   if ( $StatusMail['StatusMail'] == 1)
      // {
      //     echo " checked ";
      //   } 
      ?>
      > activée </label>
      <button type="submit" name="envoyer" padding-left="100px">Envoyer</button>
    </form>
  </div>
   <?php
    include_once("vFooter.php");
  ?>
</body>
</html>
