<?php
    session_start();
    include "bdd.php";
    $affiche_r = $bdd->query('SELECT * FROM reservations LEFT JOIN livre ON livre.isbn = reservations.isbn WHERE id_membre = '.$_SESSION['id'].'');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_reserve.css">
    <title>Mes réservations</title>
</head>
<body>
    <?php
        include "header.php";
    ?>
    <br/>
    <br/>
    <section class="ListeLR">
        <table>
            <tr>
                <td class="td1">ISBN</td>
                <td class="td1">Titre</td>
                <td class="td1">Date de réservation</td>
                <td class="td1">Date de retour maximun avant pénalité</td>
            </tr>
            <?php
                while($aff = $affiche_r->fetch()){
                    ?>
                    <tr>
                    <?php
                        echo '<td>'.$aff['isbn'].'</td>';
                        echo '<td>'.$aff['titre'].'</td>';
                        echo '<td>'.$aff['date_reservation'].'</td>';
                        echo '<td>'.$aff['date_max_retour'].'</td>';
                    ?>
                    </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
</html>