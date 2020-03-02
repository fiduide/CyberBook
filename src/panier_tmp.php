<?php
    session_start();
    include "bdd.php";
    $isbn = $_GET['isbn'];
    $ajout_P = $bdd->prepare('INSERT INTO reservations_tmp(id_membre, isbn) VALUES (? , ?)');
    $ajout_P -> execute(array(htmlspecialchars($_SESSION['id']), htmlspecialchars($isbn)));
    header('Location: Panier_R.php');
?>