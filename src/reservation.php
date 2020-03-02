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
    <section class="ListeLR">
        <form action="retour_POST.php" method="POST">
            <table style="text-align:center;">
                <tr>
                    <td class="td1"><strong>ISBN</strong></td>
                    <td class="td1"><strong>Titre</strong></td>
                    <td class="td1"><strong>Date de réservation</strong></td>
                    <td class="td1" style="color:red;"><strong>Date de retour maximun avant pénalitée</strong></td>
                </tr>
                <?php
                    while($aff = $affiche_r->fetch()){
                        ?>
                        <tr>
                        <?php
                            echo '<td>'.$aff['isbn'].'</td>';
                            echo '<td>'.$aff['titre'].'</td>';
                            echo '<td>'.$aff['date_reservation'].'</td>';
                            echo '<td style="color:red;">'.$aff['date_max_retour'].'</td>';
                        ?>
                        <td><input class="button" type="checkbox" name="isbn[]" value="<?= ($aff['isbn']) ?>"/></td>
                        </tr>
                <?php
                    }
                ?>
            </table>
            <?php
             if($affiche_r->rowCount() != 0){ ?> <!-- Si possède un résultat alors affiche -->
                <br/><input class="button" type="submit" value="Retourner le(s) livre(s)"/>
            <?php
            }else{
                echo '<p style="text-align: center; color: red;">Vous n\'avez pas de livre en réservation</p>';
            }
            ?>
        </form>
    </section>
</body>
</html>