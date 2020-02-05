<?php
include "bdd.php"?>
<?php

// Insertion du livre à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO livre (isbn, titre, editeur, annee, genre, langue, nbpages) VALUES(?, ?, ?, ?, ?, ?, ?)');
$req->execute(array(htmlspecialchars($_POST['is
$req = $bdd->prepare('INSERT INTO auteur (idPersonne, idLivre, idRole) VALUES(?, ?, 1)');bn']), htmlspecialchars($_POST['titre']),$_POST['editeur'], htmlspecialchars($_POST['annee']), $_POST['genre'], $_POST['langue'], htmlspecialchars($_POST['nbpages'])));
$req->execute(array($_POST['auteur'], htmlspecialchars($_POST['isbn'])));
// Redirection du visiteur vers le formulaire d'ajout
header('Location: AjoutL.php');
?>