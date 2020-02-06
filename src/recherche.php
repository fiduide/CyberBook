<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style_livre.css">
	<title>Résultat de votre recherche de livres</title>
</head>
<body>
	<?php include "header.php" ?>
	<?php include "bdd.php" ?>
	<br>
	<br>
	<?php
	$q = htmlspecialchars($_GET['q']); //Protection contre la saisie utilisateur
	 $articles = $bdd->query('SELECT * FROM livre LEFT JOIN auteur ON idLivre = isbn LEFT JOIN personne ON idPersonne = personne.id WHERE titre LIKE "'.$q.'%"');
		
	 if(isset($_GET['q']) AND !empty($_GET['q'])) { //Si le champs recherche n'est pas vide alors fait la recherche
		if($articles->rowCount() > 0) {  // Si le nombre le résultat trouvé est supérieur à 0 
			?> 
			<div class="align">
			<?php
		while($a = $articles->fetch()){
			$image = 'img/'.$a["isbn"].'.jpg';
			$image_par_defaut = 'img/0.jpg';
			?>
			<section class="idlivre">
						<a href="details_livre.php?titre=<?= ($a['titre']) ?>&amp;genre=<?= ($a['genre']) ?>"> <!-- Permet de rediriger la donnée titre et genre vers la page détails-->
							<tr>
								<td>
								<?php 
									if(is_file($image)){
										
										echo '<img src="'.$image.'">';
										
									}else {
										echo '<img src="'.$image_par_defaut.'"';
									}

									echo '<strong>'.$a["titre"]. '</strong>'; //affichage des titres des livres
									echo '<p><em>' . $a["prenom"] . ' - ' . $a["nom"] . '</em></p>';//affichage les prenoms et noms des auteurs
									
									?>
								</td>	
							<tr>
						</a>
					</section>
					<?php
		}
		}
		}
		else if (empty($_GET['q'])){ // Si le champs est vide 
			echo '<br><br><p style="text-align: center;">Veuillez saisir un champs de recherche<p>';
		}
		if($articles->rowCount() == 0){ // Si le résultat trouvé est inférieur à 0 
			echo '<br><br><p style="text-align: center;">Nous n\'avons trouvé aucun résultat à votre recherche</p>';
		}

		
		?>
		</div>
</body>
</html>