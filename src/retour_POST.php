<?php
session_start();
include "bdd.php";
$idM= $_SESSION['id'];
$isbn = $_POST['isbn'];

$email = $bdd->query('SELECT * FROM reservations LEFT JOIN visiteurs ON visiteurs.ID = reservations.id_membre WHERE reservations.id_membre = '.$idM.' AND date_max_retour <= CURDATE() AND date_retour is NULL');

for($i = 0; $i < count($isbn); $i++){
    $req = $bdd ->query('UPDATE reservations SET date_retour = NOW() WHERE isbn = "'.$isbn[$i].'"');
    $req = $bdd ->query('UPDATE livre SET reservation = 0, stock = stock + 1 WHERE isbn = "'.$isbn[$i].'" ');
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
    "Bonjour ".$email['pseudo'].", ".
    "vous avez reçus ce mail car vous n'avez pas rendu le livre à temps, vous obtenez donc une pénalitée.".
    "Cordialement, l'équipe CyberBook";

    $headers = "From:" . $from;

    mail($to,$subject,$message, $headers);
//On ajoute une pénalité
    $addPenality = $bdd->query('UPDATE visiteurs SET penalite = penalite + 1 WHERE ID = '.$email['ID'].'');
    header('Location: reservation.php');
}
else{
    header('Location: reservation.php');
}
?>