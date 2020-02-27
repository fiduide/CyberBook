<?php
session_start();

//Initialisation du panier
include "bdd.php";
$isbn = htmlspecialchars($_GET['isbn']);
$livre = $bdd -> query ('SELECT * FROM livre WHERE isbn = "'.$isbn.'"');
$d = $livre -> fetch();


if(!isset($_SESSION['panier'])){
    $_SESSION['panier'] = array();
    //Plusieurs choses dans le panier
    $_SESSION['panier']['isbn'] = array();
    $_SESSION['panier']['titre'] = array();
}

//ajout des livres

$select = array();
$select['titre'] = $d['titre'];
$select['isbn'] = $d['isbn'] ;
ajout($select);

function ajout($select){ //fonction pour ajouter un livre dans le panier
    array_push($_SESSION['panier']['isbn'], $select['isbn']);
    array_push($_SESSION['panier']['titre'], $select['titre']);
}
header('Location: ListeL.php');
?>