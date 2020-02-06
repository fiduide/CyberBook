<!DOCTYPE html> <!-- Ajout GENRE-->
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/style_ajout.css">
        <meta charset="utf-8" />
        <title>Ajout d'un editeur</title>
    </head>
    <body>
    	<?php include "header.php" ?>
    <form class="formulaire" action="Ajout_Edit_Post.php" method="post">
        <p> <h2 style="text-decoration: underline;">Formulaire d'ajout d'un editeur : </h2><br>
        <label for="libelle">Nouveau editeur</label> : <input  class="input" type="text" name="libelle" id="libelle" /><br /><br />
        <input style="text-align: center;" class="button" type="submit" value="Envoyer" /><br />
        </p>
        </form>
        <?php 
        include "bdd.php";
        ?>
	
    
<section style="text-align: center;">
<?php 
// Récupération des 5 derniers livre ajouté
$reponse = $bdd->query('SELECT libelle FROM editeur ORDER BY id DESC LIMIT 0, 5');

// Affichage des livres (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['libelle']) . '</strong></p>';
}

$reponse->closeCursor();

?>
</section>
    </body>
</html>