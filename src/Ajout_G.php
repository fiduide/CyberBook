<?php  
session_start();


include "bdd.php";

if(!empty($_POST['libelle'])){
    $libelle = $_POST['libelle'];

    if($libelle ==""){
        header('Location: Ajout_G.php');
    }
    else{
    // Insertion du genre à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO genre (libelle) VALUES(?)');
    $req->execute(array(htmlspecialchars($_POST['libelle'])));
    echo '<p style="text-align: center; margin: 0px; font-size: 30px; color: white;background-color: green;">Le genre ('.$_POST['libelle'].') a bien été ajouté !</p>';

}
}

?>
<!DOCTYPE html> <!-- Ajout GENRE-->
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/style_ajout.css">
        <script type="text/javascript" src="javaScript.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
        <meta charset="utf-8" />
        <title>Ajout d'un genre</title>
    </head>
    <body>
    	<?php include "header.php" ?>
    <form class="formulaire" action="ajout_G.php" onsubmit="return verif()" method="post">
        <p> <h2 style="text-decoration: underline;">Formulaire d'ajout d'un genre : </h2><br>
        <label for="genre">Nouveau genre</label> : <input  class="input" type="text" name="libelle" id="ge" /><br /><br />
        <input style="text-align: center;" class="button" type="submit" value="Envoyer" /><br />

        <?php
        ?>
	</p>
    </form>
<section style="text-align: center;">
<h3 style="text-decoration: underline;">Liste des derniers genres ajoutés :</h3>
<?php
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