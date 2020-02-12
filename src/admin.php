<!DOCTYPE html>
<html lang="fr">
<head>

    <link rel="stylesheet" type="text/css" href="css/style_admin.css">
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
    <a href="modifLivre.php"> 
    <section class="Admin">
    <p>Modification de Livre</p> 
    </section>
    </a>



    <a href="modifCompte.php"> 
    <section class="Admin">
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