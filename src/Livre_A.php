<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style_detail.css">
	<link rel="shortcut icon" type="image/png" href="img/accueil.png" />
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
	$alllivre = $bdd->query('SELECT * FROM livre  INNER JOIN auteur ON idLivre = isbn INNER JOIN editeur ON editeur.id = livre.editeur INNER JOIN personne p ON idPersonne = p.id INNER JOIN genre ON genre.id = livre.genre WHERE idPersonne  = '.$id.'');
	$Auteur = $bdd->query('SELECT * FROM livre  INNER JOIN auteur ON idLivre = isbn  INNER JOIN personne p ON idPersonne = p.id INNER JOIN genre ON genre.id = livre.genre WHERE idPersonne  = '.$id.'');
	$Auteur = $Auteur->fetch();
	if($alllivre->rowCount() == 0){ // Si le résultat trouvé est inférieur à 0 
			 echo "<br><br><center>Nous n'avons pas encore ajouté de livre pour cette auteur</center> ";
         }else{

		 
	echo '<h1 style="text-align: center;">Livre(s) de l\'auteur <strong style="text-decoration: underline;">'.$Auteur["prenom"].' - '.$Auteur["nom"].'</strong></h1><br>';
	while($alivre = $alllivre->fetch())
	{
	
	$image = 'img/'.$alivre["isbn"].'.jpg';
	$image_par_defaut = 'img/0.png';
		?>
		
		<div class="alignA">
		<section class="details_LivreA">
						<a href="details_livre.php?titre=<?= ($alivre['titre']) ?>" title="Afficher le détail du livre"><!-- Permet de rediriger la donnée titre vers la page détails-->
							<tr>
								<td>
								<?php 
									if(is_file($image)){
										
										echo '<img class="i" src="'.$image.'">';
										
									}else {
										echo '<img class="i"src="'.$image_par_defaut.'"';
									}

									echo '<p class="det"><strong>'.$alivre["titre"]. '</strong><br>'; //affichage des titres des livres 
									echo '<em>genre :  '.$alivre["libelle"].' </em><br>';
									echo '<em>editeur : '.$alivre["editeur"].'</em></p>';

									
									
									?>
								</td>	
							<tr>
						</a>
					</section>
				</div>
		
<?php
	}
		 }

?>