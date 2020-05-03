<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style_livre.css">
	<link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
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
	$reponse = $bdd->query('SELECT * FROM livre LEFT JOIN editeur ON livre.editeur = editeur.id LEFT JOIN auteur ON isbn = idLivre LEFT JOIN personne ON idPersonne = personne.id LEFT JOIN genre ON livre.genre = genre.id ORDER BY titre ASC'); 
	// On affiche les livres avec leur auteurs
	?>
	<h1 style="text-align: center;">Liste des livres de <strong>CyberBook</strong></h1>
	<div class="align">
		<?php
		while ($donnees = $reponse->fetch()) //tant que tout n'est pas marqué continuer
		{
			$image = 'img/'.$donnees["isbn"].'.jpg';
			$image_par_defaut = 'img/0.png';
				?>
					<section class="idlivre">
						<a href="details_livre.php?titre=<?= ($donnees['titre']) ?>" title="Afficher le détail du livre"> <!-- Permet de rediriger la donnée titre et genre vers la page détails-->

								<?php
									if(is_file($image)){

										echo '<img class="iD" src="'.$image.'">';

									}else {
										echo '<img class="i" src="'.$image_par_defaut.'">';
									}
									echo '<B>'.$donnees["titre"]. '</B>'; //affichage des titres des livres
									echo '<p><em>Ecrit par ' . $donnees["prenom"] . ' - ' . $donnees["nom"] . '</em></p>';//affichage les prenoms et noms des auteurs
									echo '<p><em>Genre : '.$donnees["libelle"].'</em></p>';
									echo '<p><em>Editeur : '.$donnees["editeur"].'</em></p>';
									?>
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