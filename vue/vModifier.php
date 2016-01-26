<!DOCTYPE html>
<html >

<head>
	<meta charset="UTF-8">
	<title>Modifier</title>
	<link rel="stylesheet" href=" vue/contenu/bootstrap/css/bootstrap.css">   
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="vue/contenu/bootstrap/js/bootstrap.min.js"></script>   
	<!-- <link rel="stylesheet" href=" vue/style.css">  -->
</head>

<body>
	<?php include_once("vNav.php"); ?>
	<div class="container">
		<h1>Modifier</h1>
		<a href="?page=sites">
			<span class="btn btn-default glyphicon glyphicon-arrow-left"></span>
		</a>
		<?php fErreur(); ?>
		<table class=" table table-striped">
			<tr>
				<form class="form-inline" method="POST"  action="?page=modifier">
					<input type="hidden" name="formulaire" value="fqdn">
					<td align="right"><label for="FQDN">FQDN</label></td>
					<td></td>
					<td><input type="text" class="form-inline" name="fqdn" <?php echo "value ='".$fqdn."'";?>><label for="domaine">.postwork.itinet.fr</label></td>
					<td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
				</form>
			</tr>
			<tr>
				<form class="form-inline" method="POST" action="?page=modifier">
					<input type="hidden" name="formulaire" value="ip">
					<td align="right"><label for="IP">Adresse IP</label></td>
					<td></td>
					<datalist id="ip"><option <?php echo "value ='".$globals['ippostwork']."'";?>></datalist>
					<td><input type="text" list="ip" class="form-inline" name="ip" <?php echo "value ='".$ip."'";?>>
					</td>
					<td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
				</form>
			</tr>
			<tr>
				<form class="form-inline" method="POST" action="?page=modifier">
					<input type="hidden" name="formulaire" value="description">
					<td align="right"><label for="Description">Description</label></td>
					<td></td>
					<td><textarea class="form-inline" rows="5" name="description" ><?php echo $description;?></textarea></td>
					<td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
				</form>
			</tr>
			<tr>
				<form class="form-inline" method="POST" action="?page=modifier">
					<input type="hidden" name="formulaire" value="categorie">
					<td align="right"><label for="Categorie">Catégorie</label></td>
					<td></td>
					<td>
						<select class="form-inline"  name="categorie">
							<option disabled>Catégorie...</option>
							<?php
							foreach (fAffichercategorie() as $key => $value) {
								echo "<option value='".$value['IdCategorie']."' ";
								if ($value['IdCategorie'] == $idcat) {
									echo "selected";
								}
								echo ">".htmlentities($value['Nom'])."</option>\n\t\t\t\t\t\t\t\t";
							}
							?>
						</select>
					</td>
					<td><button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Modifier</button></td>
				</form>
			</tr>
			<tr>
				<td align="right"><label for="Tag">Créer un tag</label></td>
				<td></td>
				<form class="form-inline" method="POST" action="?page=modifier">
					<input type="hidden" name="formulaire" value="tag">
					<td>
						<input type="text" class="form-inline" name="tag" placeholder="Créer un tag">
					</td>
					<td>
						<button type="submit" class="btn btn-default" name="envoyer" <?php echo "value ='".$_POST['envoyer']."'";?>>Créer</button>
					</td>
				</form>
			</tr>
			<tr>
				<td align="right"><label for="Tag">Liste de tags</label></td>
				<td></td>
				<td>
					<ul class="list-inline">
						<?php
						foreach (fAffichertagsite() as $key => $value) {
							echo "<li><form method='POST' action='?page=modifier'><input type='hidden' name='idtag' value='".$value['IdTag']."'><button type='submit' name='envoyer' value='".$_POST['envoyer']."' class='btn btn-";
							if ($value['IdSite'] == $_POST['envoyer']) {
								echo "danger glyphicon glyphicon-remove'><input type='hidden' name='formulaire' value='detagger'> ";
							} else {
								echo "success glyphicon glyphicon-ok'><input type='hidden' name='formulaire' value='tagger'> ";
							}
							echo htmlentities($value['Tag'])."</button></form></li>\n\t\t\t\t\t\t\t\t\t";
						}
						?>
					</ul>
				</td>
				<td></td>
			</tr>
		</table>
	</div>
<?php include_once("vFooter.php"); ?>
</body>

</html>