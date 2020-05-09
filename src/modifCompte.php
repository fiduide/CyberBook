<?php
session_start();
if(empty($_SESSION['group'])){ //Si session est vide alors c'est un visiteur sans connection
    $_SESSION['group'] = 'visiteur';
}else{
    if($_SESSION['group'] != 'admin'){ //Si le rôle n'est pas égale à admin alors pas de connexion à cette page
        echo '<h1 style="text-align:center; color: red;">Vous devez être connecté en tant qu\'administrateur pour accéder à cette page</h1>';
    }else{
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="css/style_gestionCompte.css">
    <link rel="stylesheet" type="text/css" href="css/style_modifCompte.css">
    <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
    <title>Mofication des membres</title>
</head>
<header>
    <?php include "bdd.php";
    include "header.php";    ?>
</header>

<body>
<br>
<br>
<br>

    <?php
        $visiteurs = $bdd->query('SELECT * FROM visiteurs ORDER BY penalite DESC'); //Req pour afficher tout les visiteurs 

    ?>
    <section class="contener">
    <section class='compte'>
        <table>
            <tr>
                <td style="text-decoration: underline"><strong>Identifiant</strong></td>
                <td style="text-decoration: underline"><strong>Email</strong></td>
                <td style="text-decoration: underline"><strong>Nom</strong></td>
                <td style="text-decoration: underline"><strong>Prénom</strong></td>
                <td style="text-decoration: underline"><strong>Numéro de téléphone</strong></td>
                <td style="text-decoration: underline"><strong>Pénalitée(s)</strong></td>
                <td style="text-decoration: underline"><strong>Rôle</strong></td>
            </tr>
            <?php
            foreach($visiteurs as $visiteur){
                echo "<tr><td></section>".$visiteur['pseudo']."</td>";
                echo "<td>" .$visiteur['email']."</td>";
                echo "<td>" .$visiteur['nom']."</td>";
                echo "<td>" .$visiteur['prenom']."</td>";
                echo "<td>" .$visiteur['telephone']."</td>";
                echo "<td>" .$visiteur['penalite']."</td>";

                if($visiteur['rôle'] == "admin"){ //Si le rôle est "ADMIN" alors l'afficher en rouge
                echo "<td><span style='color: red; text-transform : uppercase;'>".$visiteur['rôle']."</span></td>";
                }else{ //Sinon en bleu
                    echo "<td><span style='color: blue; text-transform : uppercase; '>".$visiteur['rôle']."</span></td>";
                }
                ?>
                    <td><a href="ModifCompteID.php?ID=<?= ($visiteur['ID']) ?>"><img class="imgMo" src="img/modif.png"></a><a href="delCompte.php?ID=<?= ($visiteur['ID']) ?>" onclick="return verifDelCompte();"><img class="imgMo" src="img/supp.png"></a></p></td></tr></section>
                    <!-- redirection vers les différentes pages avec l'ID en paramètre-->
            <?php
            }

            ?>
        </table>
    </section>
</body>
</html>
<?php
}
}
?>