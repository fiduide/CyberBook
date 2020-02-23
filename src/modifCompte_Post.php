<?php
session_start();
include "bdd.php";
$email = $_POST['email'];
$mdp = $_POST['mdp'];
$role = $_POST['role'];
$ID = $_GET['ID'];
$modif = $bdd->prepare('UPDATE visiteurs SET email = ?, mdp = ?,  rôle = ?
WHERE ID = ?');
$modif -> execute(array(
   $email,
   $mdp,
   $role,
   $ID
));
header('Location: modifCompte.php');
?>