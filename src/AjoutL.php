<?php
session_start();
include "bdd.php";

if(!empty($_POST['isbn']) && !empty($_POST['titre']) && !empty($_POST['editeur']) && !empty($_POST['annee']) && !empty($_POST['genre']) && !empty($_POST['langue']) && !empty($_POST['auteur'])){
    if($_POST['nbpages'] === "" && $_POST['nbpages'] == 0)
    {
        $nbpages = NULL;
    }else{
        $nbpages = $_POST['nbpages'];
    }
    // Insertion du livre à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO livre (isbn, titre, editeur, annee, genre, langue, nbpages) VALUES(?, ?, ?, ?, ?, ?, ?)');
    $req->execute(array(htmlspecialchars($_POST['isbn']), htmlspecialchars($_POST['titre']),$_POST['editeur'], htmlspecialchars($_POST['annee']), $_POST['genre'], $_POST['langue'], $nbpages));
    $req = $bdd->prepare('INSERT INTO auteur (idPersonne, idLivre, idRole) VALUES(?, ?, 1)');
    $req->execute(array($_POST['auteur'], htmlspecialchars($_POST['isbn'])));
    echo '<p style="text-align: center; margin: 0px; font-size: 30px; color: white;background-color: green;">Le livre ('.$_POST['titre'].') a bien été ajouté !</p>';
}

?>
<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/style_ajout.css">
        <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
        <link rel="shortcut icon" type="image/png" href="img/accueil.png"/>
        <script type="text/javascript" src="javaScript.js"></script>
        <meta charset="utf-8" />
        <title>Ajout d'un livre</title>
    </head>
    <body>
    	<?php include "header.php" ?>
    

        <?php $editeur = $bdd->query('SELECT * FROM editeur');?>
        <?php $langue = $bdd->query('SELECT * FROM langue');?>
        <?php $genre = $bdd->query('SELECT * FROM genre');?>
        <?php $auteur = $bdd->query('SELECT * FROM personne');?>

    <form class="formulaire" action="ajoutL.php" onsubmit="return verifLivre()" method="POST">
        <p> <h2 style="text-decoration: underline;">Ajouter un livre : </h2><br>
        <label for="isbn">ISBN</label> : <input  class="input" type="text" name="isbn" id="isbn" /><br /><br /><span id=missISBN></span>
        <label for="titre">Titre</label> :  <input  class="input"type="text" name="titre" id="titre" /><br /><br />
        <label for="annee">Année</label> :  <input  class="input"type="number" min="1500" max="2020" step="1" name="annee" id="annee" /><br /><br />
        <label for="editeur">Editeur</label> : 
         <select name="editeur" id="editeur">
         <option value="">
            <?php foreach($editeur as $edi):?>
            <option value="<?= $edi['id']?>"><?= $edi['editeur']?>
            <?php endforeach ?>
        </select><br><br>
        <label for="genre">Genres</label> : 
         <select name="genre" id="genre">
         <option value="">
            <?php foreach($genre as $g):?>
            <option value="<?= $g['id']?>"><?= $g['libelle'] ?>
            <?php endforeach ?>
        </select><br><br>
        <label for="langue">Langue</label> : 
         <select name="langue" id="langue">
         <option value="">
            <?php foreach($langue as $la):?>
            <option value="<?= $la['id']?>"><?= $la['langue'] ?>
            <?php endforeach ?>
        </select><br><br>
        <label for="langue">Auteur</label> : 
         <select name="auteur" id="auteur">
         <option value="">
            <?php foreach($auteur as $a):?>
            <option value="<?= $a['id']?>"><?= $a['prenom']?> - <?=$a['nom']?>
            <?php endforeach ?>
        </select><br><br>
        <label for="nbpages">Nombre de pages</label> :  <input class="input" type="text" name="nbpages" id="nbpages" value="" /><br /><br />
        <p style="font-size: 12px;"><em>Veulliez renseigner tout les champs !</em></p>
        <input style="text-align: center;" class="button" type="submit" value="Envoyer" id="envoi" /><br />
        <?php 
        ?>
	</p>
    </form>


<section style="text-align: center;">
<h3 style="text-decoration: underline;">Liste des derniers livres ajoutés :</h3>
<?php
// Récupération des 5 derniers livre ajouté
$reponse = $bdd->query('SELECT isbn, titre FROM livre ORDER BY id DESC LIMIT 0, 5');

// Affichage des livres (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
	echo '<p><strong>' . htmlspecialchars($donnees['titre']) . '</strong> : ' . htmlspecialchars($donnees['isbn']) . '</p>';
}

$reponse->closeCursor();

?>
</section>
    </body>
</html>