<?php
session_start();
include "bdd.php";
$isbn = $_GET['isbn'];
$ajoutR = $bdd->prepare('INSERT INTO reservations_tmp (isbn, id_membre) VALUES(?, ?)');
$ajoutR -> execute(array($isbn, $_SESSION['id']));
header('Location: ListeL.php');
?>