<?php 
session_start();
?>
<?php
include "bdd.php"?>
<?php


$libelle = $_POST['libelle'];

if($libelle ==""){
	header('Location: Ajout_G.php');
}
else{
// Insertion du genre à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO genre (libelle) VALUES(?)');
$req->execute(array(htmlspecialchars($_POST['libelle'])));

// Redirection du visiteur vers le formulaire d'ajout
header('Location: Ajout_G.php');
}?>