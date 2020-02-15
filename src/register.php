<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/style_compte.css">
    <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
    <title>Inscription</title>
</head>
<body>

<?php
include "header.php"; 
include "bdd.php";
if(!empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];

    $doublepseudo= $bdd->query('SELECT * FROM visiteurs WHERE pseudo = "'.$pseudo.'"'); //recup des pseudos
    $doublemail = $bdd->query('SELECT * FROM visiteurs WHERE email = "'.$email.'"'); //recup des emails
    $dsp = $doublepseudo->fetch();
    $dem = $doublemail->fetch();

    if($pseudo == $dsp['pseudo']){ //On vérifie que le pseudo rentré n'est pas déjà dans la base de donnée pour éviter les doublons
        
        echo '<br><br><p style="text-align: center"> Le pseudo <strong>'.$pseudo.'</strong> est déjà pris</p>';
    
    }else if($email == $dem['email']){ //On vérifie que l'email rentré n'est pas déjà dans la base de donnée pour éviter les doublons
        echo '<br><br><p style="text-align: center"> L\'email <strong>'.$email.'</strong> est déjà pris</p>';
    }
    else{ //si tout est bon alors on l'ajoute à la base de donnée 
    $req = $bdd -> prepare('INSERT INTO visiteurs (pseudo, email, mdp, rôle) VALUE (?,?,?, "membre")');
    $req -> execute(array(htmlspecialchars($pseudo), htmlspecialchars($email), htmlspecialchars($mdp)));
    header('Location: index.php');
    
}
}else{
     echo '<br><br><p style="text-align: center"> Veuillez remplir tous les champs avec une étoile</p>';
}

?>

<section>
<fieldset  style="margin-top: 3em; border-radius: 10px; font-size: 25px; margin-left: 15em; margin-right: 15em;">
<legend><strong><em>Inscription</em></strong></legend>
<form class="formulaire" action="register.php" method="POST">
    <label for="email"> * Email</label> : <input  class="email" type="email" name="email" id="email" placeholder=" " /><br /><br />
    <label for="pseudo"> * pseudo</label> : <input  class="id" type="text" name="pseudo" id="pseudo" placeholder=" "/><br /><br />
    <label for="mdp"> * Mot de passe</label> :  <input  class="password"type="password" name="mdp" id="mdp" placeholder=" "/><br /><br />
    <input style="text-align: center;" class="button" type="submit" value="Inscription" /><br />
</form>
</section>
</fieldset>
<br><br><br><br>





</body>
</html>

<style>

.password::placeholder{
background-image: url('img/password.png');
background-repeat: no-repeat;
background-position: 2px 2px;
background-size: 10px;
padding-left: 27px;
}

.id::placeholder{
background-image: url('img/id.png');
background-repeat: no-repeat;
background-position: 2px 2px;
background-size: 10px;
padding-left: 27px;
}

.email::placeholder{
background-image: url('img/arobase.png');
background-repeat: no-repeat;
background-position: 2px 2px;
background-size: 10px;
padding-left: 27px;
}