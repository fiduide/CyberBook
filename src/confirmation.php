<?php
include "bdd.php";

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
        echo "L'utilisateur n'existe pas!";
    }
}
