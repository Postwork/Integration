<html>
<head>
	<meta charset="UTF-8">
	<title>Contact</title>
</head>
<body>
	<?php
	include_once("vNav.php");
	?>
	<div align="center" class="container">
		<form action="mailto:votrenom@provider.com" method="post" name="contact"> <br> <br> <br>
			Pseudo: <br> 	
			<input name="votre nom"> <br> <br> 
			Votre message: <br>
			<textarea name="message" rows="10" cols="60"></textarea><p>
			<input type="submit" value="envoyer">
		</form>
	</div>
	<?php
	include_once("vFooter.php");
	?>
</body>	
</html>