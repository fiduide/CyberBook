<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_reserve.css">
    <title>Panier de réservation</title>
</head>
<body>
    <?php
    include "header.php";
    include "bdd.php";
    $ListR = $bdd -> query('SELECT * FROM reservations_tmp LEFT JOIN auteur ON auteur.idLivre = reservations_tmp.isbn LEFT JOIN personne ON personne.id = auteur.idPersonne LEFT JOIN livre ON livre.isbn = reservations_tmp.isbn WHERE id_membre = '.$_SESSION['id'].'');
    ?>
    <br>
    <br>
    <br>
    <section class="ListeLR">
        <table style="text-align: center;">
            <tr>
                <td class="td1">ISBN</td>
                <td class="td1">Titre du livre</td>
                <td class="td1">Auteurs</td>
            </tr>
        <?php
        while($d = $ListR->fetch()){
            echo '<td class="td"><input type="checkbox" style="margin-right: 10px;"name="book" id="book"/>'.$d['isbn'].'</td>';
            echo '<td class="td">'.$d['titre'].'</td>';
            echo '<td class="td">'.$d['prenom'].'';
            echo ' - '.$d['nom'].'</td></tr>';
        }
        ?>
        </table>
    </section>
</body>
</html>