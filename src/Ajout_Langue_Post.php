<?php 
session_start();
?>
<?php
include "bdd.php"?>
<?php


// Insertion du genre à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO langue (langue) VALUES(?)');
$req->execute(array(htmlspecialchars($_POST['lang'])));

// Redirection du visiteur vers le formulaire d'ajout
header('Location: Ajout_Langue.php');

?>