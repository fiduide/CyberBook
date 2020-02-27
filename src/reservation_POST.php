<?php
session_start();
include "bdd.php";
$isbn = htmlspecialchars($_GET['isbn']);
$idM= $_SESSION['id'];

$req = $bdd ->query('INSERT INTO reservations(isbn, date_reservation, date_max_retour, id_membre, date_retour) VALUES("'.$isbn.'", Now(), ADDDATE(NOW(), INTERVAL 30 DAY), '.$idM.', NULL)');
$modif_bdd = $bdd -> query('UPDATE livre SET reservation = 1 WHERE isbn = "'.$isbn.'"');
header('Location: listeL.php');
?>
