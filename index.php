<html>
<head>
  <link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.min.css"> 
  <link rel="stylesheet" href=" vue/contenu/style.css"> 
  <style type="text/css">
  </style>
</head>

<body>
  <?php
  if (isset($_POST['deconnecter'])) {
    unset($_SESSION['IdUtilisateur']);
  }
  session_start();
  if (!empty($_GET['page']) AND is_file('controleur/'.$_GET['page'].'.php')) {
    include('controleur/'.$_GET['page'].'.php');
  }
  else {
    include('controleur/index.php');
  }
  ?>
</body>
</html>
