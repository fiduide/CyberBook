<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style_livre.css">
	<link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
	<title>Résultat de votre recherche de livres</title>
</head>
<body>
	<?php include "header.php" ?>
	<?php include "bdd.php" ?>
	<br>
	<br>
	<?php
	$q = htmlspecialchars($_GET['q']); //Protection contre la saisie utilisateur
	$articles = $bdd->query('SELECT * FROM livre LEFT JOIN genre ON genre.id = livre.genre LEFT JOIN editeur ON editeur.id = livre.editeur LEFT JOIN auteur ON idLivre = isbn LEFT JOIN personne ON idPersonne = personne.id WHERE isbn= "'.$q.'"  OR titre LIKE "%'.$q.'%" ');
		
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
										
									echo '<img class="iD" src="'.$image.'">';
									
								}else {
									echo '<img class="i" src="'.$image_par_defaut.'">';
								}

								echo '<B>'.$a["titre"]. '</B>'; //affichage des titres des livres
								echo '<p><em>Ecrit par ' . $a["prenom"] . ' - ' . $a["nom"] . '</em></p>';//affichage les prenoms et noms des auteurs
								echo '<p><em>Genre : '.$a["libelle"].'</em></p>';
								echo '<p><em>Editeur : '.$a["editeur"].'</em></p>';
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