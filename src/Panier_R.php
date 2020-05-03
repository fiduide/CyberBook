<?php
session_start();
include "bdd.php";
$recherche = $bdd->query('SELECT * FROM reservations_tmp LEFT JOIN livre ON livre.isbn = reservations_tmp.isbn LEFT JOIN auteur ON auteur.idLivre = livre.isbn LEFT JOIN personne ON auteur.idPersonne = personne.id  WHERE id_membre = '.$_SESSION['id'].'');
$date =$bdd->query('SELECT ADDDATE(CURDATE(),INTERVAL 30 DAY) AS dateAc');
$date = $date->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_reserve.css">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
    <title>Panier de réservation</title>
</head>
<body>
    <?php
    include "header.php";
    ?>
    <section class="ListeLR">
        <form action="reservation_POST.php" method="POST">
            <table style="text-align:center;">
                <tr>
                    <td class="td1"><strong>ISBN</strong></td>
                    <td class="td1"><strong>Titre du livre</strong></td>
                    <td class="td1"><strong>Auteur</strong></td>
                    <td class="td1" style="color: red;"><strong>Date de retour exigée</strong></td>
                </tr>
                <?php while($d = $recherche->fetch()){ ?>
                    <tr>
                        <td>
                            <?php echo $d['isbn']; ?>
                        </td>
                        <td>
                            <?php echo $d['titre'];?>
                        </td>
                        <td>
                            <?php echo $d['prenom']." ".$d['nom'];?>
                        </td>
                        <td style="color: red;">
                            <?php echo $date['dateAc'];?>
                        </td>
                        <td><input class="button" type="checkbox" name="isbn[]" value="<?= ($d['isbn']) ?>"/></td> <!-- On récupère tous les isbns pour les envoyer -->
                        <td><a href="suppLivreR.php?isbn=<?=($d['isbn']) ?>"><img src="img/supp.png"> </td>
                    </tr>
                <?php }?>
            </table>
            <?php
                if($recherche->rowCount() != 0){?> <!-- Si possède un résultat alors affiche -->
                    <br/><input class="button" type="submit" value="Réserver"/>
            <?php
                }else{
                    echo '<p style="text-align: center; color: red">Vous n\'avez pas de livre dans votre panier</p>';
                }
            ?>
        </form>
</section>
</body>
</html>