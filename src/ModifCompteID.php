<?php 
session_start();
?>
<?php 
    include "bdd.php";
    $ID = $_GET['ID'];
    $rechercheCompte = $bdd -> query('SELECT * FROM visiteurs WHERE ID = '.$ID.'');
    $rechercheCompte = $rechercheCompte->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    
    <script type="text/javascript" src="javaScript.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
    <link rel="stylesheet" type="text/css" href="css/style_gestionCompte.css">
    <title>Modification du compte</title>
</head>
<body>
<header>
    <?php
        include "header.php";
    ?>
</header>

<form class="formulaire" style="text-align: center;" onsubmit="return verifModifCompte();"action="ModifCompteID.php"  method="POST">
<span style="color: blue;">Pseudo : </span> <?= $rechercheCompte['pseudo']?>
<label style="color: blue; margin-left: 15px;" for="email">Email</label> :  <input style="width: 11em;"  class="input" type="Email" name="email" id="email" value=" <?= $rechercheCompte['email'] ?>" /><br><br>
<label style="color: blue;" for="mdp">Mot de passe</label> :  <input  class="input" type="text" name="mdp" id="mdp" value=" <?= $rechercheCompte['mdp'] ?>" />
<label style="color: red;" for="role">Rôle</label> :  <input  class="input"  type="text" name="role" id="role" value=" <?=$rechercheCompte['rôle'] ?>" />
<br><br /><br />
<input style="text-align: center;" class="button" type="submit" value="Modifier" id="envoi" />
<a class="button" style="color: red; background-color:whitesmoke;" href="ModifCompte.php">Annuler</a>

<?php 
    if(isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['role'])){
        $mdp = $_POST['mdp'];
        $email = $_POST['email'];   
        $role = $_POST['role'];

        if($email = $rechercheCompte['email']){
            echo '<p>L\'email est déjà pris</p>';
        }
        else if($role != "admin" || $role != "membre"){
           echo '<p>Veuillez renseigner un rôle connu dans la base de donnée !</p>';
        }
        else {
            $modifCompteID = $bdd->prepare('UPDATE visiteurs SET email = ?, mdp = ?, rôle = ? WHERE ID = '.$ID.'');
            $modifCompteID->execute(array(htmlspecialchars($email), htmlspecialchars($mdp), htmlspecialchars($rôle)));
            echo '<h1>Le compte à bien été modifié</h1>';
        }
    }




?>


    
</body>
</html>