<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    
        <link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.css">      
        <link rel="stylesheet" href=" vue/style.css"> 
    
  </head>
  <body>
    <div class="container">
      <h1> Inscrivez vous</h1>
    
      <form class="form" action="?page=inscription">
        <input type="text" name="pseudo" placeholder="Pseudo">
        <input type="text" name="nom" placeholder="Nom">
        <input type="text" name="prenom" placeholder="Prenom">
        <input type="date" name="datenaissance" placeholder="Date Naissance">
        <input type="password" name="motdepasse" placeholder="Mot de passe">
        <input type="password" name="motdepasse2" placeholder="Vérification mot de passe">
        <button type="submit" name="envoyer">S'enregistrer</button>
      </form>
    </div>
  </body>
</html>

