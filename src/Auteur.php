<?php
session_start();
include "bdd.php";


//Recherche Auteurs :
if(!empty($_GET['rechercheA'])){
	$rechercheA = htmlspecialchars($_GET['rechercheA']); //Protection contre la saisie utilisateur
	$Auteur = $bdd->query('SELECT id, nom, prenom FROM personne WHERE nom LIKE "%'.$rechercheA.'" OR prenom LIKE "'.$rechercheA.'%"');

	if (empty($_GET['rechercheA'])){ // Si le champs est vide
		echo "<center>Veuillez saisir un champs de recherche</center>";
	}
	if($Auteur->rowCount() == 0){ // Si le résultat trouvé est inférieur à 0
		echo "<p style='text-align: center;margin: 0px; font-size: 30px; color: white;background-color: red;'>Nous n'avons trouvé aucun résultat à votre recherche</p>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style_auteur.css">
	<link rel="stylesheet" type="text/css" href="css/style_livre.css">
	<link rel="stylesheet" type="text/css" href="css/style_a.css">
	<link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
	<title>Liste des Auteurs</title>
</head>
<body>

	<?php include "header.php" ?>
	<header>
		<div class="align">
			<form  class="rechercheA" action="auteur.php" method="GET">
				<input style="width: 50em; height: 40px;" type="search" name="rechercheA" placeholder="Recherche...">
				<input class="buttonA" type="submit" value="Recherche">
			</form>
		</div>


		<?php
			if(isset($_GET['rechercheA']) AND !empty($_GET['rechercheA'])) { //Si le champs recherche n'est pas vide alors fait la recherche
				if($Auteur->rowCount() > 0) {  // Si le nombre le résultat trouvé est supérieur à 0 
					?>
					<div class="alignA">
					<?php
				while($A = $Auteur->fetch()){
					?>
					<a href="Livre_A.php?id=<?= ($A['id']) ?>">
					<section class="idA">
								 <!-- Permet de rediriger la donnée titre et genre vers la page détails-->
									<?php
										echo '<p><em>' . $A["prenom"] . ' - ' . $A["nom"] . '</em></p>';//affichage les prenoms et noms des auteurs	 
									?>
								</a>
					</section>
							</a>
				<?php
				}
				}
				}

				?>
			   </div>
	</header>
<br/>
<br/>

	<?php
		// On récupère le contenu de la table livre + personne
		$reponse = $bdd->query('SELECT nom, prenom, id FROM personne');

		// On affiche les livres avec leur auteurs
		?>

		<div class="alignA">

			<?php
			while ($donnees = $reponse->fetch())
				{
					?>
						<div class="auteur">
						<a href="livre_A.php?id=<?= ($donnees['id']) ?>">
						<section class="idA">
							<?php
								echo '<p><strong>' . $donnees["prenom"] . ' - ' . $donnees["nom"] . '</strong></p>';
								?>
						</section>
					</a>
					</div>
			<?php
				}
			?>
		</div>
	<br><br>
</body>
</html>