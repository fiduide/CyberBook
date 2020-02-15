<?php 
session_start();
    include "bdd.php";
    if($_POST['nbpages'] === "" && $_POST['nbpages'] == '0')
    {
        $nbpages = NULL;
    }else{
        $nbpages = $_POST['nbpages'];
    }
    $isbn = $_GET['isbn'];
    $titre = $_POST['titre'];
    $editeur = $_POST['editeur'];
    $annee= $_POST['annee'];
    $genre =  $_POST['genre'];
    $langue = $_POST['langue'];
    $modif = $bdd->prepare('UPDATE livre SET titre = ?, editeur = ?, annee = ?,  genre = ?,  langue = ? , nbpages = ?
     WHERE isbn = ?');
    $modif -> execute(array(
        $titre,
        $editeur,
        $annee,
        $genre,
        $langue,
        $nbpages,
        $isbn
    ));
    header('Location: gestionLivre.php');
?>
