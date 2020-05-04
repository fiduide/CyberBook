<?php
session_start();
include "bdd.php";
$idM = $_SESSION['id'];
$isbn = $_GET['isbn'];
$delete = $bdd->query('DELETE FROM reservations_tmp WHERE isbn = "'.$isbn.'" AND id_membre = "'.$_SESSION['id'].'"');
header('Location: panier_R.php');
?>
