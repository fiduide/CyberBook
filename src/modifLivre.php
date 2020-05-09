<?php
session_start();
if(empty($_SESSION['group'])){ //Si session est vide alors c'est un visiteur sans connection
    $_SESSION['group'] = 'visiteur';
}else{
    if($_SESSION['group'] != 'admin'){ //Si le rôle n'est pas égale à admin alors pas de connexion à cette page
        echo '<h1 style="text-align:center; color: red;">Vous devez être connecté en tant qu\'administrateur pour accéder à cette page</h1>';
    }else{

        if(!empty($_GET['isbn']) && !empty($_POST['titre']) && !empty($_POST['editeur']) && !empty($_POST['annee']) && !empty($_POST['genre']) &&  !empty($_POST['langue']) && !empty($_POST['nbpages'])){
        include "bdd.php";
        if($_POST['nbpages'] === "" && $_POST['nbpages'] == '0')
        {
            $nbpages = NULL;
        }else{
            $nbpages = $_POST['nbpages'];
        }

        $isbn = $_GET['isbn'];
        $titre = $_POST['titre'];
        $editeur = $_POST['editeur'];
        $annee= $_POST['annee'];
        $genre =  $_POST['genre'];
        $langue = $_POST['langue'];
        $modif = $bdd->prepare('UPDATE livre SET titre = ?, editeur = ?, annee = ?,  genre = ?,  langue = ? , nbpages = ?
        WHERE isbn = ?');
        $modif -> execute(array(
            $titre,
            $editeur,
            $annee,
            $genre,
            $langue,
            $nbpages,
            $isbn
        ));
        echo '<p style="text-align: center; margin: 0px; font-size: 30px; color: white;background-color: green;">Le livre ('.$_POST['titre'].') a bien été modifié !</p>';
    }
?>


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
            $Value = $bdd->query('SELECT * FROM livre LEFT JOIN editeur ON livre.editeur = editeur.id LEFT JOIN langue ON langue.id = livre.langue LEFT JOIN auteur ON livre.isbn = auteur.idLivre LEFT JOIN personne ON idPersonne = personne.id LEFT JOIN genre ON livre.genre = genre.id WHERE isbn = "'.$isbn.'"');
            $Value = $Value->fetch();
        ?>

    <form class="formulaire"  onsubmit="return verifModif()" action="modifLivre.php?isbn=<?= ($Value['isbn'])?>"  method="POST">
        <p> <h2 style="text-decoration: underline;">Modifier un Livre : </h2>
        <p><em style="font-size: 15px; color: red">Pensez à bien re-séléctionner chaque case</em></p>
        <p>ISBN : <?= $Value['isbn']?></p>
        <label for="titre">Titre</label> :  <input  class="input"type="text" name="titre" id="titre"  value="<?=$Value['titre'] ?>" /><br /><br />
        <label for="annee">Année</label> :  <input  class="input"type="number" min="1500" max="2020" step="1" name="annee" id="annee" value="<?=$Value['annee'] ?>"/><br /><br />
        <label for="editeur">Editeur</label> :
         <select name="editeur" id="editeur">
         <option value=""><?php echo $Value['editeur'] ?>
            <?php foreach($editeur as $edi):?>
            <option value="<?= $edi['id']?>"><?= $edi['editeur']?>
            <?php endforeach ?>
        </select><br><br>
        <label for="genre">Genres</label> :
         <select name="genre" id="genre">
         <option value=""><?php echo $Value['libelle'] ?>
            <?php foreach($genre as $g):?>
            <option value="<?= $g['id']?>"><?= $g['libelle'] ?>
            <?php endforeach ?>
        </select><br><br>
        <label for="langue">Langue</label> :
         <select name="langue" id="langue">
         <option value=""><?php echo $Value['langue'] ?>
            <?php foreach($langue as $la):?>
            <option value="<?= $la['id']?>"><?= $la['langue'] ?>
            <?php endforeach ?>
        </select><br><br>
        <label for="auteur">Auteur</label> :
         <select name="auteur" id="auteur">
         <option value=""><?php echo $Value['prenom']. " - ".$Value['prenom'] ?>
            <?php foreach($auteur as $a):?>
            <option value="<?= $a['id']?>"><?= $a['prenom']?> - <?=$a['nom']?>
            <?php endforeach ?>
        </select><br><br>
        <label for="nbpages">Nombre de pages</label> :  <input class="input" type="text" name="nbpages" id="nbp" value="<?=$Value['nbpages'] ?>" /><br /><br />
        <p style="font-size: 12px;"><em>Veuillez renseigner tous les champs !</em></p>
        <input style="text-align: center;" class="button" type="submit" value="Modifier" id="envoi" />
        <a class="button" style="color: red; background-color:whitesmoke;" href="gestionLivre.php">Annuler</a>
    </form>
</body>
</html>

<?php
    }
}
?>