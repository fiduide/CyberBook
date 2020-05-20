<?php
session_start();
include "header.php";
include "bdd.php";

if($_SESSION['group'] != 'admin' && $_SESSION['group'] != 'membre'){ //Si session est vide alors c'est un visiteur sans connection
    $_SESSION['group'] = 'visiteur';
    echo '<h1 style="text-align:center; color: red; margin-top: 3em;">Vous devez être connecté pour accéder à cette page</h1>';
}
else {
    $req= $bdd->query('SELECT * FROM visiteurs WHERE ID = '.$_SESSION['id'].'');
    $req = $req->fetch();
    ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style_compte.css">
	<link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
	<title>Mon Compte</title>
</head>
<body>
    <div class="align">
        <section class="id_Compte">
            <div class="gauche">
                <figure>
                    <img src="img/utilisateur.png">
                    <figcaption style='text-align: center;'><?php echo $req['nom'] .' - '. $req['prenom'];?></figcaption>
                </figure>
            </div>
        </section>
    </div>
</body>
</html>


    <?php
}
?>

