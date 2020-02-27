<?php
session_start();
$action = (isset($_POST['action'])? $_POST['action']:) ;
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
    ?>
    <br>
    <br>
    <br>
    <section class="ListeLR">
    <table>
        <tr>
            <td>ISBN</td>
            <td>Titre du livre</td>
        </tr>
        <tr><td>
        <?php
        echo join("<br>",$_SESSION['panier']['isbn']) ;
        ?>
        </td>
        <td>
        <?php
        echo join("<br>",$_SESSION['panier']['titre']) ;

        if(!in_array($action,array('suppression'))) {
            $erreur = true;
        }
        switch($action) {
            Case "suppression":
                supprimerArticle($isbn);
                break;
        }
        ?>
        </td>
        </tr>
    </table>
</section>
</body>
</html>