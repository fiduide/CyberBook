<?php 

include "bdd.php";

$isbn = $_GET['isbn'];

$delete = $bdd->query('DELETE FROM livre WHERE isbn ="'.$isbn.'"');
$delete = $bdd->query('DELETE FROM auteur WHERE isbn ="'.$isbn.'"');
header('Location: gestionLivre.php');

?>