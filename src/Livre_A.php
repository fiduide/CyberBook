<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style_detail.css">
	<title>Liste des livres par Auteur</title>
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
	$id = htmlspecialchars($_GET['id']); //Protection contre la saisie utilisateur et récupération de la variable titre
	$alllivre = $bdd->query('SELECT titre, annee, isbn, nbpages FROM livre INNER JOIN auteur ON idLivre = isbn INNER JOIN personne p ON idPersonne = p.id WHERE idPersonne = '.$id.'');

	while($alivre = $alllivre->fetch())
	{
		?>
		<center>
		<section class="details_Livre">
						<a href="details_livre.php?titre=<?= ($alivre['titre']) ?>"> <!-- Permet de rediriger la donnée titre vers la page détails-->
							<tr>
								<td>
								<?php 
									if($alivre["isbn"] != $alivre["isbn"]){
										echo '<img src="img/0.jpg"';
									}else {
										echo '<img src="img/'.$alivre["isbn"].'.jpg"';
									}
									echo '<p><strong><u>Titre</u></strong> : '.$alivre["titre"]. '<br>'; //affichage des titres des livres
									echo '<strong><u>ISBN</u></strong> : '.$alivre["isbn"]. '<br>'; 
									echo '<strong><u>Nombre de page</u></strong> : '.$alivre["nbpages"]. ' pages <br>';
									echo '<strong><u>Date de sortie</u></strong> : '.$alivre["annee"]. '<br>'; 
									
									
									?>
								</td>	
							<tr>
						</a>
					</section>
		
<?php
	}

?>
</center >
