<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="css/style_gestionCompte.css">
    <link rel="stylesheet" type="text/css" href="css/style_modifCompte.css">
    <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
    <title>Mofication des membres</title>
</head>
<header>
    <?php include "bdd.php";
    include "header.php";    ?>
</header>

<body>
<br>
<br>
<br>

    <?php
        $visiteurs = $bdd->query('SELECT * FROM visiteurs'); //Req pour afficher tout les visiteurs 

    ?>
    <section class="contener">
        <h1>PSEUDO - EMAIL - ROLE</h1>
        <?php
        foreach($visiteurs as $visiteur){
            echo "<section class='compte';><p style='text-align:center'>".$visiteur['pseudo']."";
            echo " - " .$visiteur['email']." - ";
            if($visiteur['rôle'] == "admin"){ //Si le rôle est "ADMIN" alors l'afficher en rouge 
            echo "<span style='color: red; text-transform : uppercase;'>".$visiteur['rôle']."</span>";
            }else{ //Sinon en bleu
                echo "<span style='color: blue; text-transform : uppercase; '>".$visiteur['rôle']."</span>";
            }
            ?>
                <a href="ModifCompteID.php?ID=<?= ($visiteur['ID']) ?>"><img class="imgMo" src="img/modif.png"></a><a href="delCompte.php?ID=<?= ($visiteur['ID']) ?>" onclick="return verifDelCompte();"><img class="imgMo" src="img/supp.png"></a></p></section>
                <!-- redirection vers les différentes pages avec l'ID en paramètre-->
        <?php
        }

        ?>
    </section>
</body>
</html>