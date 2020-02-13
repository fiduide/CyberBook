<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<header>
    <?php include "bdd.php";
    include "header.php";    ?>
</header>
<body>
    <?php
        $visiteurs = $bdd->query('SELECT * FROM visiteurs');


        while($visiteurs = $visiteurs->fetch()){
            echo ''.$visiteurs['pseudo'].'';



        }

    
    
    
    
    
    
    ?>











    
</body>
</html>