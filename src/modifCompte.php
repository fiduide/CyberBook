<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        $visiteurs = $bdd->query('SELECT * FROM visiteurs');

       ?> <section class="contener">
        <?php
        foreach($visiteurs as $visiteur){
            echo "<section class='compte';><p style='text-align:center'>".$visiteur['pseudo']."";
            echo " - " .$visiteur['email']." - ";
            if($visiteur['rôle'] == "admin"){
            echo "<span style='color: red; text-transform : uppercase;'>".$visiteur['rôle']."</span>";
            }else{
                echo "<span style='color: blue; text-transform : uppercase; '>".$visiteur['rôle']."</span>";
            }
                echo '<a href="modifCompte.php"><img class="imgMo" src="img/modif.png"></a><a href="supprimeCompte.php"><img class="imgMo" src="img/supp.png"></a></p></section>';
        
        }

    ?>
    </section>
</body>
</html>