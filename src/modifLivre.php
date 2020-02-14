<!DOCTYPE html>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="css/style_ajout.css">
        <script type="text/javascript" src="javaScript.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
        
        <title>Modification Livre</title>
    </head>
    <body>
        <?php 
        include "header.php";
        include "bdd.php";

        $isbn = $_GET['isbn'];
         $editeur = $bdd->query('SELECT * FROM editeur');
         $langue = $bdd->query('SELECT * FROM langue');
         $genre = $bdd->query('SELECT * FROM genre');
         $auteur = $bdd->query('SELECT * FROM personne');
         $Value = $bdd->query('SELECT * FROM livre LEFT JOIN editeur ON editeur.id = livre.editeur LEFT JOIN langue ON langue.id = livre.langue LEFT JOIN genre ON genre.id = livre.genre LEFT JOIN auteur ON auteur.idLivre = livre.isbn LEFT JOIN personne ON auteur.idPersonne = personne.id WHERE isbn = "'.$isbn.'"');
         $Value = $Value->fetch(); 
        ?>
        
    <form class="formulaire"  onsubmit="return verifModif()" action="modifLivre_Post.php?isbn=<?= ($Value['isbn'])?>"  method="POST">
        <p> <h2 style="text-decoration: underline;">Modifier un Livre : </h2><br>
        <p>ISBN : <?= $Value['isbn']?></p>
        <label for="titre">Titre</label> :  <input  class="input"type="text" name="titre" id="titre"  value="<?=$Value['titre'] ?>" /><br /><br />
        <label for="annee">Année</label> :  <input  class="input"type="number" min="1500" max="2020" step="1" name="annee" id="annee" value="<?=$Value['annee'] ?>"/><br /><br />
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
        <label for="auteur">Auteur</label> : 
         <select name="auteur" id="auteur">
            <option value="">
            <?php foreach($auteur as $a):?>
            <option value="<?= $a['id']?>"><?= $a['prenom']?> - <?=$a['nom']?>
            <?php endforeach ?>
        </select><br><br>
        <label for="nbpages">Nombre de pages</label> :  <input class="input" type="text" name="nbpages" id="nbp" value="0" /><br /><br />
        <p style="font-size: 12px;"><em>Veulliez renseigner tout les champs !</em></p>
        <input style="text-align: center;" class="button" type="submit" value="Modifier" id="envoi" />
        <a class="button" style="color: red; background-color:whitesmoke;" href="gestionLivre.php">Annuler</a>
    </form>
</body>
</html>