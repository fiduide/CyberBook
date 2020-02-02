<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style_livre.css">
	<title>Résultat de votre recherche</title>
</head>
<body>
	<?php include "header.php" ?>
	<?php include "bdd.php" ?>
	<br>
	<br>
	<?php
	$articles = $bdd->query('SELECT titre FROM livre ORDER BY id DESC');

		if(isset($_GET['q']) AND !empty($_GET['q'])) { //Si le champs recherche n'est pas vide alors fait la recherche
		   $q = htmlspecialchars($_GET['q']); //Protection contre la saisie utilisateur

		   $articles = $bdd->query('SELECT * FROM livre LEFT JOIN auteur ON idLivre = isbn LEFT JOIN personne ON idPersonne = personne.id WHERE titre LIKE "%'.$q.'%" OR nom LIKE "%' .$q. '" OR prenom LIKE "%' .$q. '"');
		
		if($articles->rowCount() > 0) {  // Si le nombre le résultat trouvé est supérieur à 0 
			?> 
			<div class="align">
			<?php
		while($a = $articles->fetch()){
		      echo '<section class="idlivre"><p>'. $a['titre'] .'</p>';
		      echo '<p>'. $a['nom'] .' - '. $a['prenom'] .'</p><br></section><br>';
		}
		}
		}

		else if (empty($_GET['q'])){
			echo "Veuillez saisir un champs de recherche";
		}
		
		if($articles->rowCount() == 0){ // Si le résultat trouvé est inférieur à 0 
			echo "<br><br><center>Nous n'avons trouvé aucun résultat à votre recherche</center> ";
		}
		?>
		</div>

</body>
</html>