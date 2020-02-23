<?php 
session_start();
if(empty($_SESSION['group'])){ //Si session est vide alors c'est un visiteur sans connection
    $_SESSION['group'] = 'visiteur';
}else{
    if($_SESSION['group'] != 'admin'){ //Si le rôle n'est pas égale à admin alors pas de connexion à cette page 
        echo '<h1 style="text-align:center; color: red;">Vous devez être connecté en tant qu\'administrateur pour accéder à cette page</h1>';
    }else{
        include "bdd.php";
        $ID = $_GET['ID'];
        $modifCompte = $bdd->query('SELECT * FROM visiteurs WHERE ID = '.$ID.' ');
        $modifCompte = $modifCompte->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
    <link rel="stylesheet" type="text/css" href="css/style_ajout.css">
    <script type="text/javascript" src="javaScript.js"></script>
    <title>Modification du compte</title>
</head>
<body>

    <?php
        include "header.php";
    ?>

    <form onsubmit="return verifCompte()"class="formulaire" style="text-align: center"method="POST" onsubmit="return verifCompte()" action="modifCompte_Post.php?ID=<?= ($modifCompte['ID']) ?>">
            <p><span style="color: blue">Pseudo : </span><?= $modifCompte['pseudo']?></p>
            <label for="email"><span style="color: blue">Email</span></label> :  <input  class="input"type="text" name="email" id="email" style="width: 10em;"  value="<?=$modifCompte['email'] ?>" /><br /><br />
            <label for="mdp"><span style="color: blue">Mot de passe</span> : <input class="input" type="text" name="mdp" id="mdp" style="width:10em;" value="<?= $modifCompte['mdp'] ?>"/> <br /> <br />
            <label for="role"><span style="color: red">Rôle</span> <em style="font-size: 10px;">en minuscule --></em> : <input class="input" type="text" name="role" id="role" style="width:5em;" value="<?= $modifCompte['rôle'] ?>"/> <br /> <br />
            <input class="button" type="submit"  value="Modifier"/> <a  class="button" style ="color: red;" href="modifCompte.php" >Retour</a>
    </form>







</body>
</html>
<?php
    }
}
?>