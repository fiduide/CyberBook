<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/style_ajout.css">
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
        <title>Ajout d'un livre</title>
    </head>
    <body>
    	<?php include "header.php" ?>
    <form class="formulaire" action="AjoutA_Post.php" onsubmit="return verifAuteur()" method="post">
        <p> <h2 style="text-decoration: underline;">Formulaire d'ajout d'un Auteur : </h2><br>
        <label for="prenom">Prénom</label> : <input  class="input" type="text" name="prenom" id="prenom" /><br /><br />
        <label for="nom">Nom</label> :  <input  class="input"type="text" name="nom" id="nom" /><br /><br />
        <input style="text-align: center;" class="button" type="submit" value="Envoyer" /><br />
        <p style="font-size: 12px;"><em>Veulliez renseigner tout les champs !</em></p>
        <?php 
        ?>
	</p>
    </form>
<section style="text-align: center;">
<h3 style="text-decoration: underline;">Liste des derniers auteurs ajoutés :</h3>
<?php
include "bdd.php";
// Récupération des 5 derniers livre ajouté
$reponse = $bdd->query('SELECT nom, prenom FROM personne ORDER BY id DESC LIMIT 0, 5');

// Affichage des livres (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><em>' . htmlspecialchars($donnees['prenom']) . ' ' . htmlspecialchars($donnees['nom']) . '</em></p>';
}

$reponse->closeCursor();

?>
</section>
    </body>
</html>