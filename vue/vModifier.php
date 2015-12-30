<!DOCTYPE html>
<html >

<head>
	<meta charset="UTF-8">
	<title>Modifier</title>

	<link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.css">   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="vue/contenu/bootstrap/js/bootstrap.min.js"></script>   
	<!--  <link rel="stylesheet" href=" vue/style.css">  -->
</head>

<body>
	<?php include_once("vNav.php"); ?>
	<div class="container petit">
		<h1>Modifier</h1>
		<form method="POST" name="bouton" action="?page=modifier">
			<button type="submit" name="envoyer" value="1">Modifier </button>
		</form>
		
		<div >
			<table class=" table table-striped">
				<tr>
					<form class="form-inline" method="POST" action="?page=modifier">
						<td align="right"><label for="FQDN">FQDN : </label></td>
						<td></td>
						<td><input type="text" class="form-inline" name="fqdn" <?php echo "value ='".$fqdn."'";?>><label for="domaine">.postwork.itinet.fr</label></td>
						<td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
					</form>
				</tr>
				<tr>
					<form class="form-inline" method="POST" action="?page=modifier">
						<td align="right"><label for="IP">Adresse IP : </label></td>
						<td></td>
						<td><input type="text" class="form-inline" name="ip" <?php echo "value ='".$ip."'";?></td>
						<td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
					</form>
				</tr>
				<tr>
					<form class="form-inline" method="POST" action="?page=modifier">
						<td align="right"><label for="Description">Description : </label></td>
						<td></td>
						<td><textarea class="form-inline" rows="5" name="description" ><?php echo $description;?></textarea></td>
						<td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
					</form>
				</tr>
				<tr>
					<form class="form-inline" method="POST" action="?page=modifier">
						<td align="right"><label for="Categorie">Catégorie : </label></td>
						<td></td>
						<td>
							<select class="form-inline"  name="categorie">
								<?php
								foreach (fAffichercategorie() as $key => $value) {
									echo "<option value='".$value['IdCategorie']."' ";
									if ($value['IdCategorie'] == $idcategorie) {
										echo "selected='selected'";
									}
									echo ">".$value['Nom']."</option>";
								}
								?>
							</select>
						</td>
						<td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
					</form>
				</tr>
				<tr>
					<form class="form-inline" method="POST" action="?page=modifier">
						<td align="right"><label for="Tag">Tag : </label></td>
						<td></td>
						<td>
							<select class="form-inline"  name="catégorie">
								<?php
								foreach (fAffichercategorie() as $key => $value) {
									echo "<option value='".$value['IdCategorie']."' ";
									if ($value['IdCategorie'] == $idcategorie) {
										echo "selected='selected'";
									}
									echo ">".$value['Nom']."</option>";
								}
								?>
							</select>
						</td>
						<td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
					</form>
				</tr>

			</table>
		</div> 	
	</div>
	<?php include_once("vFooter.php"); ?>
</body>

</html>