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
			<label for="email"> email: </label> <br> 	
			<input name="votre adresse mail"> <br> <br> 
			<label for="message"> Votre message: </label> <br>
			<textarea name="message" rows="10" cols="60"></textarea><p>
			<br>
			<input type="submit" value="envoyer">
		</form>
	</div>
	<?php
	include_once("vFooter.php");
	?>
</body>	
</html>