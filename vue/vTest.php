<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Sites</title>
  <link rel="stylesheet" href="vue/contenu/bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="vue/contenu/bootstrap/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  include_once("vNav.php");
  ?>

  <form method="POST" action="?page=test">
    <input type="text" name="vasy">
    <button type='submit' name='envoyer'>ok</button>
  </form>

  <?php
  include_once("vFooter.php");
  ?>
</body>
</html>