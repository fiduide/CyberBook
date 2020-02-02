<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style_livre.css">
	<title>Liste des Auteurs</title>
</head>
<body>
	<?php include "header.php" ?>
	<br>
	<br>
	<br>
	<?php
		include "bdd.php" // Accès à la bdd
	?>
	<?php
		// On récupère le contenu de la table livre + personne
		$reponse = $bdd->query('SELECT nom, prenom, id FROM personne');

		// On affiche les livres avec leur auteurs
		?>
		<div class="align">
			<?php
			while ($donnees = $reponse->fetch())
				{
					?>
					
						<a href="Livre_A.php?id=<?= ($donnees['id']) ?>">
						<section class="idlivre">
							<?php 
								echo '<p><strong>' . $donnees["prenom"] . ' - ' . $donnees["nom"] . '</strong></p>';
								?>
						</section>
					</a>
			<?php 
				}
			?>
		</div><br><br>
</body>
</html>