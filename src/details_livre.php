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
	$genre = $_GET['genre']; //Protection contre la saisie utilisateur et récupération de la variable genre
	$req = $bdd->query('SELECT * FROM livre WHERE titre LIKE "'.$titre.'%"');
	$req2 = $bdd->query('SELECT libelle FROM genre LEFT JOIN livre ON genre.id = livre.id WHERE livre.id = "'.$genre.'"');
	$e = $req2->fetch(); 
	
	while ($d = $req->fetch()){
	$image = 'img/'.$d["isbn"].'.jpg';
	$image_par_defaut = 'img/0.jpg';
?>
<div class="align">
		<section class="details_Livre">
							<tr>
								<td>
								<?php 
									if(is_file($image)){ //si l'image existe ou non 
										
										echo '<img src="'.$image.'">';
										
									}else {
										echo '<img src="'.$image_par_defaut.'"';
									}
									echo '<p><strong><u>Titre</u></strong> : '.$d["titre"]. '<br>'; //affichage des titres des livres
									echo '<strong><u>ISBN</u></strong> : '.$d["isbn"]. '<br>'; //isbn
									echo '<strong><u>Genre</u></strong> : '.$e["libelle"]. '<br>'; //genre
									echo '<strong><u>Nombre de page</u></strong> : '.$d["nbpages"]. ' pages <br>'; //nbpages
									echo '<strong><u>Date de sortie</u></strong> : '.$d["annee"]. '<br>'; //annee
									
									?>
								</td>	
							<tr>
						</a>
					</section>
	</div>
					<?php
	}

?>










</body>
</html>
