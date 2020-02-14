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
include "bdd.php";
?>
<br><br>
<fieldset style="margin-top: 3em; border-radius: 10px; font-size: 25px; margin-left: 15em; margin-right: 15em;">
<legend>Connexion</legend>
<form class="formulaire" action="connexion.php" method="POST">
    <label for="pseudo">pseudo</label> : <input  class="id" type="text" name="pseudo" id="pseudo" placeholder=" "/><br /><br />
     <label for="mdp">Mot de passe</label> :  <input  class="password"type="password" name="mdp" id="mdp" /><br><br>
     <input style="text-align: center;" class="button" type="submit" value="Connexion"  placeholder=" "/>
     <a href="register.php"><input class="button" type="button" value="Inscription"></a>
</form>
</fieldset>


<?php 

if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];


$req = $bdd->query('SELECT * FROM visiteurs WHERE pseudo = "'.$pseudo.'"');
$req = $req -> fetch();


if($mdp != $req['mdp']){ //Si le mdp ne correspond pas
    echo '<p style="text-align:center;">Vous avez saisi un mauvais mot de passe</p>';

}if($pseudo != $req['pseudo']){ //Si le pseudo n'est pas reconnu dans la base de donnée
    echo '<p style="text-align: center;">Votre pseudo n\'est pas reconnu</p>';
}else{
    $_SESSION['group'] = $req['rôle']; //Je récupère le rôle de la personne 
    header('Location: index.php');
}
}


?>

<br><br><br>





    
</body>
</html>