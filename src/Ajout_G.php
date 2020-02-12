<!DOCTYPE html> <!-- Ajout GENRE-->
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/style_ajout.css">
        <meta charset="utf-8" />
        <title>Ajout d'un genre</title>
    </head>
    <body>
    	<?php include "header.php" ?>
    <form class="formulaire" action="Ajout_G_Post.php" method="post">
        <p> <h2 style="text-decoration: underline;">Formulaire d'ajout d'un genre : </h2><br>
        <label for="libelle">Nouveau genre</label> : <input  class="input" type="text" name="libelle" id="libelle" /><br /><br />
        <input style="text-align: center;" class="button" type="submit" value="Envoyer" /><br />

        <?php 
        ?>
	</p>
    </form>
<section style="text-align: center;">
<h3 style="text-decoration: underline;">Liste des derniers genres ajoutés :</h3>
<?php
include "bdd.php";
// Récupération des 5 derniers livre ajouté
$reponse = $bdd->query('SELECT * FROM genre ORDER BY id DESC LIMIT 0, 5');

// Affichage des livres (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><em>' . htmlspecialchars($donnees['libelle']) . '</em></p>';
}

$reponse->closeCursor();

?>
</section>
    </body>
</html>