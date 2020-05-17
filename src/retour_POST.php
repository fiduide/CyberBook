<?php
session_start();
include "bdd.php";
$idM= $_SESSION['id'];
$isbn = $_POST['isbn'];

$email = $bdd->query('SELECT * FROM reservations LEFT JOIN visiteurs ON visiteurs.ID = reservations.id_membre WHERE reservations.id_membre = '.$idM.' AND date_max_retour <= CURDATE() AND date_retour is NULL');

for($i = 0; $i < count($isbn); $i++){
    $req = $bdd ->query('UPDATE reservations SET date_retour = NOW() WHERE isbn = "'.$isbn[$i].'"');
    $req = $bdd ->query('UPDATE livre SET stock = stock + 1 WHERE isbn = "'.$isbn[$i].'" ');
}

//Si le résultat de la recherche de $email n'est pas égale à 1 alors on envoit un mail car l'utilisateur possède un livre en retard
if($email->rowCount() != 0){
    $email = $email->fetch();
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "CyberBook@biblio.fr";
    $to = ''.$email['email'].'';
    $subject = "Vous avez obtenu une pénalitée";
    $message =
    "<html>
    <head>
    <title>Hey</title>
    </head>
    <a href='https://cyberbook-ipssi.000webhostapp.com/index.php'>
    <header style='margin-bottom: 10px;'>
    <div style='height: 350px;width: 100%;position: relative;'>
        <img style='width: 100%;height:50%; position: relative;' src='https://firebasestorage.googleapis.com/v0/b/test-df0b6.appspot.com/o/logo.png?alt=media&token=419c8afd-c593-48b4-8621-4231b7bb8b9a'>
        <div class='position: absolute;bottom: 0;background: 0 0;height: 60px;width: 100%;-webkit-filter: blur(7px);'>
            <svg width='100%' height='100%' viewBox='0 0 100 100' preserveAspectRatio='none'>
                <path d='M0 100 L 0 0 C 25 100 75 100 100 0 L 100 100' fill='black'></path>
            </svg>
        </div>
    </header>
    </a>
    <body style='padding: 0%; margin: 0; font-family: Helvetica, Arial , sans-serif'>
        <div style='background: #f7f7f7; padding: 5% 5% 5% 5%'>
            <div style='background: white; padding: 2%'>
                <p style='text-align: center; font-size: 18px'><b>Bonjour ".$prenom.",</b></p><br/>
                <span style='text-align: center; display: block; margin: auto'>
                    <a href='https://cyberbook-ipssi.000webhostapp.com'>
                        <input type='button' value='Vous avez obtenu une pénalitée' style='border: none; border: 2px solid #3A539B; background: transparent; color: #3A539B; font-size: 16px; height: 60px; cursor: pointer; outline: none;'/>
                    </a>
                </span>
            </div>
            <div style='background: white; color: #666; padding: 1%; border-radius: 0 0 10px 10px; padding-top: 20px'>
                <b>
                    <span>© 2020 <a href='https://cyberbook-ipssi.000webhostapp.com/index.php' style='color:#666;outline:none;text-decoration: none;margin-bottom:5px'>CyberBook</a></span>
                </b>
            </div>
        </div>
    </body>
</html>";


$headers = "MIME-Version : 1.0" . "\r\n";
$headers .="Content-type:text/html; charset='utf-8'";

    mail($to,$subject,$message, $headers);
//On ajoute une pénalité
    $addPenality = $bdd->query('UPDATE visiteurs SET penalite = penalite + 1 WHERE ID = '.$email['ID'].'');
    header('Location: reservation.php');
}
else{
    header('Location: reservation.php');
}
?>