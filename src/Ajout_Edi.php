<?php
session_start();
include "bdd.php";

if(!empty($_POST['editeur'])){
$libelle = htmlspecialchars($_POST['editeur']);

// Insertion du genre à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO editeur (editeur) VALUES(?)');
$req->execute(array($libelle));
echo '<p style="text-align: center; margin: 0px; font-size: 30px; color: white;background-color: green;">L\'editeur ('.$_POST['editeur'].') a bien été ajouté !</p>';

}

?>
<!DOCTYPE html> <!-- Ajout editeur-->
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/style_ajout.css">
        <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
        <meta charset="utf-8" />
        <title>Ajout d'un editeur</title>
    </head>
    <body>
    	<?php include "header.php" ?>
    <form class="formulaire" action="ajout_Edi.php" onsubmit="return verifEdit()" method="post">
        <p> <h2 style="text-decoration: underline;">Formulaire d'ajout d'un editeur : </h2><br>
        <label for="editeur">Nouveau editeur</label> : <input  class="input" type="text" name="editeur" id="edit" value=""/><br /><br />
        <input style="text-align: center;" class="button" onclick="return verif();" type="submit" value="Envoyer" /><br />
        </p>
    </form>

    <section style="text-align: center;">
        <h3 style="text-decoration: underline;">Liste des editeurs ajoutés :</h3>
        <?php
        // Récupération des 5 derniers livre ajouté
        $reponse = $bdd->query('SELECT * FROM editeur ORDER BY id DESC LIMIT 0, 5');

        // Affichage des livres (toutes les données sont protégées par htmlspecialchars)
        while ($donnees = $reponse->fetch())
        {
            echo '<p><em>' . htmlspecialchars($donnees['editeur']) . '</em></p>';
        }

        $reponse->closeCursor();

        ?>
    </section>
</body>
</html>