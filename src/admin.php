<?php
session_start();
if(empty($_SESSION['group'])){ //Si session est vide alors c'est un visiteur sans connection
    $_SESSION['group'] = 'visiteur';
}else{
    if($_SESSION['group'] != 'admin'){ //Si le rôle n'est pas égale à admin alors pas de connexion à cette page
        include "header.php";
        echo '<h1 style="text-align:center; margin-top: 3em; color: red;">Vous devez être connecté en tant qu\'administrateur pour accéder à cette page</h1>';
    }else{
    ?>
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
<?php
}
}
?>