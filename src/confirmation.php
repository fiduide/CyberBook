<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_detail.css">
	<link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
	<title>Confirmation</title>
</head>

<body>
<header>
	<?php include "header.php"?>
</header>
<br/>
<br/>
<br/>
<div class="align">
    <section class="confirm">
        <?php
        include 'bdd.php';
        ini_set('display_errors', 'on');

        if (isset($_GET['pseudo'], $_GET['key']) && !empty($_GET['pseudo']) && !empty($_GET['key'])) {
            $pseudo = $_GET['pseudo'];
            $key = $_GET['key'];

            $requser = $bdd->prepare("SELECT * FROM visiteurs WHERE pseudo= ? AND confirm_key= ?");
            $requser->execute(array($pseudo, $key));
            $userexist = $requser->rowCount();


            if ($userexist == 1) {
                $user = $requser->fetch();
                if ($user['confirme'] == 0) {
                    $updateuser = $bdd->prepare('UPDATE visiteurs SET confirme = 1 WHERE pseudo=? AND confirm_key = ?');
                    $updateuser->execute(array($pseudo, $key));
                    echo "Votre compte a bien été confirmé";
                } else {
                    echo "Votre compte a déjà été confirmé ";
                }
            } else {
                echo "L'utilisateur est introuvable !";
            }
        }
        ?>
    </section>
</div>
</body>
</html>
