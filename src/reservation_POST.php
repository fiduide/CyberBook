<?php
session_start();
include "bdd.php";
$idM= $_SESSION['id'];
$isbn = $_POST['isbn'];
for($i = 0; $i < count($isbn); $i++){ //Tant que l'array de isbn n'est pas égale à $i alors on ajoute à la base de donnée
    $req = $bdd ->query('INSERT INTO reservations(isbn, date_reservation, date_max_retour, id_membre, date_retour) VALUES("'.$isbn[$i].'", Now(), ADDDATE(NOW(), INTERVAL 30 DAY), '.$idM.', NULL)');
    $modif_bdd = $bdd -> query('UPDATE livre SET reservation = 1 WHERE isbn = "'.$isbn[$i].'"');
    $delete = $bdd->query('DELETE FROM reservations_tmp WHERE isbn = "'.$isbn[$i].'" AND id_membre = "'.$_SESSION['id'].'"');
}
header('Location: listeL.php');

?>
