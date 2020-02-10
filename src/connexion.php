<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style_compte.css">
    <title>Connexion</title>
</head>
<body>
<?php 
include "header.php"; 
include "bdd.php";
?>
<br><br>
<form class="formulaire" action="connexion.php" method="POST">
    <p> Connexion </p>
    <label for="pseudo">pseudo</label> : <input  class="input" type="text" name="pseudo" id="pseudo" /><br /><br />
     <label for="mdp">Mot de passe</label> :  <input  class="input"type="password" name="mdp" id="mdp" /><br /><br />
     <input style="text-align: center;" class="button" type="submit" value="Connexion" />
     <a href="register.php"><input class="button" type="button" value="Inscription"></a>

</form>


<?php 

if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
$pseudo = $_POST['pseudo'];
$mdp = $_POST['mdp'];


$req = $bdd->query('SELECT * FROM visiteurs WHERE pseudo = "'.$pseudo.'"');
$req = $req -> fetch();


if($mdp != $req['mdp']){
    echo '<p style="text-align:center;">Vous avez saisi un mauvais mot de passe</p>';

}else if($pseudo != $req['pseudo']){
    echo '<p style="text-align: center;">Votre pseudo n\'est pas reconnu</p>';
}else{
    $_SESSION['group'] = $req['rôle'];
    header('Location: index.php');
}
}


?>







    
</body>
</html>