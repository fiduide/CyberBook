<?php
    session_start();
    include "bdd.php";
    $affiche_r = $bdd->query('SELECT * FROM reservations LEFT JOIN livre ON livre.isbn = reservations.isbn WHERE id_membre = '.$_SESSION['id'].' AND date_retour is NULL');
    $afficher_ancien_r = $bdd->query('SELECT * FROM reservations LEFT JOIN livre ON livre.isbn = reservations.isbn WHERE id_membre = '.$_SESSION['id'].' AND date_retour is NOT NULL ORDER BY date_reservation DESC');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_reserve.css">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
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
    <section class="ListeLR" style="opacity: 0.65">
        <table style="text-align:center;">
            <tr>
                <td class="td1"><strong>ISBN</strong></td>
                <td class="td1"><strong>Titre</strong></td>
                <td class="td1"><strong>Date de réservation</strong></td>
                <td class="td1" style="color:red;"><strong>Date de retour du livre</strong></td>
            </tr>
            <?php
                while($affA = $afficher_ancien_r->fetch()){
            ?>
                <tr>
                    <?php
                        echo '<td>'.$affA['isbn'].'</td>';
                        echo '<td>'.$affA['titre'].'</td>';
                        echo '<td>'.$affA['date_reservation'].'</td>';
                        echo '<td style="color:red;">'.$affA['date_retour'].'</td>';
                    ?>
                </tr>
                <?php
                    }
                ?>
        </table>
    </section>
    <br/>
    <br/>
</body>
</html>