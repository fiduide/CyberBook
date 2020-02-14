<!DOCTYPE html>
<html lang="fr">
<head>

    <link rel="stylesheet" type="text/css" href="css/style_admin.css">
    <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
    <title>Admin</title>
</head>
<body>
<header>
		<?php include "header.php" ?>
	</header>
		<br>
		<br>
		<br>
	<?php include "bdd.php"?>
    <div class="align">
    <a href="gestionLivre.php"> 
    <section class="Admin">
    <img class="i" src="img/book.png"/>
    <p>Modification de Livre</p> 
    
    </section>
    </a>
    



    <a href="modifCompte.php"> 
    <section class="Admin">
    <img class="i" src="img/utilisateur.png"/>
    <p>Modification d'un Compte</p>
    </section>
    </a>
    </div>

    <br />
    <br />
    <br />
    <br />
</body>
</html>