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
    "<html>".
    "<head></head>".
    "<body style='padding: 0%; margin: 0; font-family: Helvetica, Arial , sans-serif'>".
        "<div style='background: #f7f7f7; padding: 5% 5% 5% 5%'>".
            "<div style='background: #9B59B6; padding: 1%; border-radius: 10px 10px 0 0'>".
                "<a href='https://cyberbook-ipssi.000webhostapp.com/index.php' style='color: white; text-decoration: none; font-weight: 100; font-size: 22px'>CyberBook</a>".
            "</div>".
            "<div style='background: white; padding: 2%'>".
                "<p style='text-align: center; font-size: 18px'><b>Bonjour ".$email['pseudo'].",</b></p><br/>".
                "<span style='text-align: center; display: block; margin: auto'>".
                    "<a href='' target='_blank'>".
                        "<input type='button' value='Vous avez obtenu une pénalitée' style='border: none; border: 2px solid #3A539B; background: transparent; color: #3A539B; font-size: 16px; height: 60px; cursor: pointer; outline: none;'/>".
                    "</a>".
                "</span>".
            "</div>".
            "<div style='background: white; color: #666; padding: 1%; border-radius: 0 0 10px 10px; padding-top: 20px'>".
                "<b>".
                    "<span>© 2020 <a href='https://cyberbook-ipssi.000webhostapp.com/index.php' style='color:#666;outline:none;text-decoration: none;margin-bottom:5px'>CyberBook</a></span>".
                "</b>".
            "</div>".
        "</div>".
    "</body>".
"</html>";


$headers = "MIME-Version : 1.0" . "\r\n";
$headers .="Content-type:text/html; charset=utf-8)";

    mail($to,$subject,$message, $headers);
//On ajoute une pénalité
    $addPenality = $bdd->query('UPDATE visiteurs SET penalite = penalite + 1 WHERE ID = '.$email['ID'].'');
    header('Location: reservation.php');
}
else{
    header('Location: reservation.php');
}
?>