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
        if(isset($_GET['isbn'])){
        $isbn = $_GET['isbn'];
        $LivreExist = $bdd -> query('SELECT isbn FROM livre WHERE isbn = "'.$isbn.'"');
        $n = 1;
        while(isset($_SESSION['panier'][$n])){
            $n++;
        }
        $_SESSION['panier'][$n] = $isbn;
        for($i = 0; $i < $n; $i++){
        echo $_SESSION['panier'][$n];
        $n++;
        $i++;
        }
    }
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
        ?>
        </table>
    </section>
</body>
</html>