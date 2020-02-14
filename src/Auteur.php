<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style_auteur.css">
	<link rel="stylesheet" type="text/css" href="css/style_livre.css">
	<link rel="stylesheet" type="text/css" href="css/style_a.css">
	<link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
	<title>Liste des Auteurs</title>
</head>
<body>
	
	<?php include "header.php" ?>
	<header>
		<div class="align">
			<form  class="rechercheA" action="rechercheA.php" method="GET">
				<input style="width: 50em; height: 30px;" type="search" name="rechercheA" placeholder="Recherche...">
				<input class="buttonA" type="submit" value="Recherche">
			</form>
		</div>
	</header>











	<?php
		include "bdd.php" // Accès à la bdd
	?>
	<?php
		// On récupère le contenu de la table livre + personne
		$reponse = $bdd->query('SELECT nom, prenom, id FROM personne');

		// On affiche les livres avec leur auteurs
		?>
	
		<div class="alignA">
			
			<?php
			while ($donnees = $reponse->fetch())
				{
					?>
						<div class="auteur">
						<a href="Livre_A.php?id=<?= ($donnees['id']) ?>">
						<section class="idA">
							<?php 
								echo '<p><strong>' . $donnees["prenom"] . ' - ' . $donnees["nom"] . '</strong></p>';
								?>
						</section>
					</a>
					</div>
			<?php 
				}
			?>
		</div>
	<br><br>
</body>
</html>