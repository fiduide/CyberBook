<?php
include "bdd.php";


if($_POST['nbpages'] === "" && $_POST['nbpages'] == 0)
{
    $nbpages = NULL;
}else{
    $nbpages = $_POST['nbpages'];
}



// Insertion du livre à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO livre (isbn, titre, editeur, annee, genre, langue, nbpages) VALUES(?, ?, ?, ?, ?, ?, ?)');
$req->execute(array(htmlspecialchars($_POST['isbn']), htmlspecialchars($_POST['titre']),$_POST['editeur'], htmlspecialchars($_POST['annee']), $_POST['genre'], $_POST['langue'], $nbpages));
$req = $bdd->prepare('INSERT INTO auteur (idPersonne, idLivre, idRole) VALUES(?, ?, 1)');
$req->execute(array($_POST['auteur'], htmlspecialchars($_POST['isbn'])));
// Redirection du visiteur vers le formulaire d'ajout
header('Location: AjoutL.php');
?>