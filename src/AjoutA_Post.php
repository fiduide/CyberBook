<?php
include "bdd.php"?>
<?php

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];

if($nom =="" OR $prenom==""){
	header('Location: AjoutA.php');
}
else{
// Insertion d'auteur à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO personne (nom, prenom) VALUES(?, ?)');
$req->execute(array(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom'])));

// Redirection du visiteur vers le formulaire d'ajout
header('Location: AjoutA.php');
}?>