<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Connexion</title>
  <link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.css">        
  <link rel="stylesheet" href=" vue/style.css"> 
</head>

<body>

  <div class="container">
    <div class="wrapper2" >
      <h1>Connectez vous</h1>
      <h4 style="color:red;"><?php fErreur2(); ?></h4>
      <?php 
      if (isset($_SESSION['inscription'])) {
        echo '<h4 style="color:lawngreen;">Inscription réussie.<h4>';
      }
      ?>
      <form class="form" method="POST" role="form" action="?page=connexion">
        <input type="text" name="pseudo" placeholder="Pseudo" required>
        <input type="password" name="motdepasse" placeholder="Mot de passe" required>
        <button type="submit" name="envoyer">Se connecter</button>
      </form> 
    </div>

    <ul class="bg-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
  </div>





</body>
</html>