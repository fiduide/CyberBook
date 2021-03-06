<?php session_start();
ini_set("error_reporting", E_ALL);
ini_set("display_errors", "1");
if (isset($_POST['pseudo']) && isset($_POST['mdp'])) {
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    include "bdd.php";
    $req = $bdd->query('SELECT * FROM visiteurs WHERE pseudo = "' . $pseudo . '"');
    $req = $req->fetch();
    if ($mdp != $req['mdp']) { //Si le mdp ne correspond pas
        echo '<p style="text-align:center; margin: 0px; font-size: 30px; color: white;background-color: red;">Vous n\'avez pas saisi les bons identifiants de connexion</p>';
    } else if ($pseudo != $req['pseudo']) { //Si le pseudo n'est pas reconnu dans la base de donnée
        echo '<p style="text-align: center; margin: 0px; font-size: 30px; color: white;background-color: red;">Vous n\'avez pas saisi les bons identifiants de connexion</p>';
    } else {
        if ($req['confirme'] == 1) {
            $_SESSION['group'] = $req['rôle']; //Je stock le rôle de la personne
            $_SESSION['id'] = $req['ID']; // Je stock l'id
            header('Location:index.php');
        } else {
            echo '<p style="text-align:center; margin: 0px; font-size: 30px; color: white;background-color: grey;">Vous devez confirmer votre inscription avant de vous connectez</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" type="text/css" href="css/style_compte.css">
    <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
    <title>Connexion</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <br><br>
    <fieldset style="margin-top: 3em; border-radius: 10px; font-size: 25px; margin-left: 15em; margin-right: 15em;">
        <legend>Connexion</legend>
        <form onsubmit="return verifCo()" class="formulaire" action="connexion.php" method="POST">
            <label for="pseudo">Identifiant</label> : <input class="input" type="text" name="pseudo" id="pseudo" placeholder=" " /><br /><br />
            <label for="mdp">Mot de passe</label> : <input class="input" type="password" name="mdp" id="mdp" /><br><br>
            <input style="text-align: center; color: #4cc143" class="button" type="submit" value="Connexion" />
            <a href="register.php"><input style='color: #4F8AFF;'class="button" type="button" value="Inscription"></a>
        </form>
    </fieldset>
    <br /><br /><br />
</body>

</html>