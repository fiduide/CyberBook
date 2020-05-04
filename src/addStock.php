<?php
include 'bdd.php';
$isbn = htmlspecialchars($_GET['isbn']);
//ajout du stock
$req = $bdd->query('UPDATE livre SET stock = stock + 1 WHERE isbn = "'.$isbn.'"');
//pour retourner à la page précédente
$req2 = $bdd -> query('SELECT * FROM livre WHERE isbn = "'.$isbn.'"');

$req = $req2->fetch();

header('Location: details_livre.php?isbn='.$req['isbn'].'');
?>