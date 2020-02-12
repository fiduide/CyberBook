<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style_detail.css">
	<title>Détails du livre</title>
</head>
<body>
<header>
	<?php include "header.php"?>
</header>
<br>
<br>
<br>

<?php include "bdd.php"?>
<?php 
	$titre = $_GET['titre']; //Protection contre la saisie utilisateur et récupération de la variable titre

	$req = $bdd->query('SELECT * FROM livre LEFT JOIN genre ON livre.genre = genre.id LEFT JOIN editeur ON editeur.id = livre.editeur LEFT JOIN langue ON langue.id = livre.langue WHERE titre LIKE "'.$titre.'%"');
	
	


while ($d = $req->fetch()){
	$image = 'img/'.$d["isbn"].'.jpg';
	$image_par_defaut = 'img/0.png';
	echo '<h1 style="text-align:center;">Détail du livre <strong style="text-decoration: underline;">'.$d["titre"].'</strong></h1>';
	?>
	<div class="align">
		<section class="details_Livre">
			<?php 
				if(is_file($image)){ //si l'image existe ou non 
											
					echo '<img class="img" src="'.$image.'">';
											
				}else {
					echo '<img class="img"src="'.$image_par_defaut.'">';
					}
				echo '<p class="det">';		
				echo '<strong><u>ISBN</u></strong> : '.$d["isbn"]. '<br>'; //isbn
				echo '<strong><u>Genre</u></strong> : '.$d["libelle"]. '<br>'; //genre
				echo '<strong><u>Editeur</u></strong> : '.$d["editeur"]. '<br>'; //Editeur
				echo '<strong><u>Langue</u></strong> : '.$d["langue"]. '<br>'; //Editeur
				echo '<strong><u>Nombre de page</u></strong> : '.$d["nbpages"]. ' pages <br>'; //nbpages
				echo '<strong><u>Date de sortie</u></strong> : '.$d["annee"]. '<br>'; //annee	
			?>
			</section>
		</div>

	<?php
	}

?>










</body>
</html>
