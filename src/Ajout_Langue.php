<!DOCTYPE html> <!-- Ajout langue-->
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/style_ajout.css">
        <script type="text/javascript" src="javaScript.js"></script>
        <meta charset="utf-8" />
        <title>Ajout d'une nouvelle Langue</title>
    </head>
    <body>
    	<?php include "header.php" ?>
    <form class="formulaire" action="Ajout_Langue_Post.php" onsubmit="return verif()" method="post">
        <p> <h2 style="text-decoration: underline;">Formulaire d'ajout d'une nouvelle Langue: </h2><br>
        <label for="lang">Nouvelle Langue</label> : <input  class="input" type="text" name="lang" id="lang" /><br /><br />
        <input style="text-align: center;" class="button" type="submit" value="Envoyer" /><br />

        <?php 
        ?>
	</p>
    </form>
<section style="text-align: center;">
<h3 style="text-decoration: underline;">Liste des derniers genres ajoutés : </h3>
<?php
include "bdd.php";
// Récupération des 5 derniers livre ajouté
$reponse = $bdd->query('SELECT * FROM langue ORDER BY id DESC LIMIT 0, 5');

// Affichage des livres (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><em>' . htmlspecialchars($donnees['langue']) . '</em></p>';
}

$reponse->closeCursor();

?>
</section>
    </body>
</html>