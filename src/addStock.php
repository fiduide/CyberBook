<?php
include 'bdd.php';
$isbn = htmlspecialchars($_GET['isbn']);

$req = $bdd->query('UPDATE livre SET stock = stock + 1 WHERE isbn = "'.$isbn.'"');
$req2 = $bdd -> query('SELECT * FROM livre WHERE isbn = "'.$isbn.'"');

$req = $req2->fetch();

header('Location: details_livre.php?titre='.$req['titre'].'');
?>