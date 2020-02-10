<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/style_ajout.css">
        <meta charset="utf-8" />
        <title>Ajout d'un livre</title>
    </head>
    <body>
    	<?php include "header.php" ?>
        <?php include "bdd.php"?>

        <?php $editeur = $bdd->query('SELECT * FROM editeur');?>
        <?php $langue = $bdd->query('SELECT * FROM langue');?>
        <?php $genre = $bdd->query('SELECT * FROM genre');?>
        <?php $auteur = $bdd->query('SELECT * FROM personne');?>

    <form class="formulaire" action="Ajout_Post.php" method="POST">
        <p> <h2 style="text-decoration: underline;">Ajouter un livre : </h2><br>
        <label for="isbn">ISBN</label> : <input  class="input" type="text" name="isbn" id="isbn" /><br /><br />
        <label for="titre">Titre</label> :  <input  class="input"type="text" name="titre" id="titre" /><br /><br />
        <label for="annee">Année</label> :  <input  class="input"type="number" min="1500" max="2020" step="10" name="annee" id="annee" /><br /><br />
        <label for="editeur">Editeur</label> : 
         <select name="editeur" id="editeur">
            <?php foreach($editeur as $edi):?>
            <option value="<?= $edi['id']?>"><?= $edi['editeur']?>
            <?php endforeach ?>
        </select><br><br>
        <label for="genre">Genres</label> : 
         <select name="genre" id="genre">
            <?php foreach($genre as $g):?>
            <option value="<?= $g['id']?>"><?= $g['libelle'] ?>
            <?php endforeach ?>
        </select><br><br>
        <label for="langue">Langue</label> : 
         <select name="langue" id="langue">
            <?php foreach($langue as $la):?>
            <option value="<?= $la['id']?>"><?= $la['langue'] ?>
            <?php endforeach ?>
        </select><br><br>
        <label for="langue">Auteur</label> : 
         <select name="auteur" id="auteur">
            <?php foreach($auteur as $a):?>
            <option value="<?= $a['id']?>"><?= $a['prenom']?> - <?=$a['nom']?>
            <?php endforeach ?>
        </select><br><br>
        <label for="nbpages">Nombre de pages</label> :  <input class="input" type="text" name="nbpages" id="nbpages" /><br /><br />
        <p style="font-size: 12px;"><em>Veulliez renseigner tout les champs !</em></p>
        <input style="text-align: center;" class="button" type="submit" value="Envoyer" /><br />
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