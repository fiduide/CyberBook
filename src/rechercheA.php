<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/style_auteur.css">
    <title>Résultat de votre recherche d'auteurs</title>
</head>
<body>
<?php include "header.php" ?>
<?php include "bdd.php" ?>
	<br>
    <br>
    
    <?php
    


		//Recherche Auteurs :
		$rechercheA = htmlspecialchars($_GET['rechercheA']); //Protection contre la saisie utilisateur
		$Auteur = $bdd->query('SELECT id, nom, prenom FROM personne WHERE nom Or prenom LIKE "'.$rechercheA.'%" ');
		if(isset($_GET['rechercheA']) AND !empty($_GET['rechercheA'])) { //Si le champs recherche n'est pas vide alors fait la recherche
		 if($Auteur->rowCount() > 0) {  // Si le nombre le résultat trouvé est supérieur à 0 
			 ?> 
			 <div class="alignA">
             
			 <?php
		 while($A = $Auteur->fetch()){
			 ?>
             <a href="Livre_A.php?id=<?= ($A['id']) ?>">
			 <section class="idlivreA">
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
		 else if (empty($_GET['rechercheA'])){ // Si le champs est vide 
			 echo "Veuillez saisir un champs de recherche";
		 }
		 if($Auteur->rowCount() == 0){ // Si le résultat trouvé est inférieur à 0 
			 echo "<br><br><center>Nous n'avons trouvé aucun résultat à votre recherche</center> ";
         }
         ?>
        </div>
        
</body>
</html>