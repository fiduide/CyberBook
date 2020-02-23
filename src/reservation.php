<?php
session_start();
include "bdd.php";
$isbn = htmlspecialchars($_GET['isbn']);
$idM= $_SESSION['id'];
$req = $bdd ->execute('INSERT INTO reservations_tmp(isbn, date_reservation, id_membre) VALUES("'.$isbn.'", NOW(), '.$idM.')');
header('Location: listeL.php');
?>
