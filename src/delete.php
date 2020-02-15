<?php
ini_set( "error_reporting", E_ALL );
ini_set( "display_errors", "1" );
include "bdd.php";

$isbn = $_GET['isbn'];

$delete = $bdd->query('DELETE FROM livre WHERE isbn ="'.$isbn.'"');
$delete = $bdd->query('DELETE FROM auteur WHERE idLivre ="'.$isbn.'"');
header('Location: gestionLivre.php');
?>