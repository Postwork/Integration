<html lang="fr">
<head>
  <title>Connexion</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="contenu/bootstrap/css/bootstrap.css">
</head>
<body>
  <div class="container-fluid">
    <h1>Connexion</h1>
    <form class="form-inline" method="POST" role="form" action="?page=connexion">
      <div class="form-group">
        <label for="pseudo">Pseudo:</label>
        <input type="text" class="form-control" name="pseudo">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" name="pwd">
      </div>
      <button type="submit" class="btn btn-default" name="envoyer">Envoyer</button>
    </form>
  </div>
</body>
</html>