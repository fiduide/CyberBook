<?php
session_start();
include "bdd.php";
$idM= $_SESSION['id'];
$isbn = $_POST['isbn'];
for($i = 0; $i < count($isbn); $i++){
    $req = $bdd ->query('DELETE FROM reservations WHERE isbn = "'.$isbn[$i].'"');
    $req = $bdd ->query('UPDATE livre SET reservation = 0 WHERE isbn = "'.$isbn[$i].'" ');
}
header('Location: reservation.php');
?>