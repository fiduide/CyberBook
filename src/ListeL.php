<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style_livre.css">
	<title>Liste des livres</title>
</head>
<body>
	<header>
		<?php include "header.php" ?>
	</header>
		<br>
		<br>
		<br>
	<?php include "bdd.php"?>

	<?php
	// On récupère le contenu de la table livre + personne via la table auteur
	$reponse = $bdd->query('SELECT titre, prenom, nom, isbn, genre, editeur FROM livre LEFT JOIN auteur ON isbn = idLivre LEFT JOIN personne ON idPersonne = personne.id ORDER BY titre ASC');
	
	// On affiche les livres avec leur auteurs
	?>
	<div class="align">
		<?php
		while ($donnees = $reponse->fetch()) //tant que tout n'est pas marqué continuer
		{
			$image = 'img/'.$donnees["isbn"].'.jpg';
			$image_par_defaut = 'img/0.png';
				?>
					<section class="idlivre">
						<a href="details_livre.php?titre=<?= ($donnees['titre']) ?>&amp;genre=<?= ($donnees['genre']) ?>&amp;editeur=<?= ($donnees['editeur']) ?>"> <!-- Permet de rediriger la donnée titre et genre vers la page détails-->
							<tr>
								<td>
								<?php 
									if(is_file($image)){
										
										echo '<img class="i" src="'.$image.'">';
										
									}else {
										echo '<img class="i" src="'.$image_par_defaut.'"';
									}

									echo '<strong>'.$donnees["titre"]. '</strong>'; //affichage des titres des livres
									echo '<p><em>' . $donnees["prenom"] . ' - ' . $donnees["nom"] . '</em></p>';//affichage les prenoms et noms des auteurs
									
									?>
								</td>	
							<tr>
						</a>
					</section>
					
					
	
	<br>
	<br>
	<?php 
		}
	?>
	</div>

</body>
</html>

