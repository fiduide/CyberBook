<?php
session_start();
include "bdd.php";
$ID = $_GET['ID'];
$deleteCompte = $bdd ->prepare('DELETE FROM visiteurs WHERE ID= ? ');
$deleteCompte->execute(array($ID));
header('Location: modifCompte.php');
?>