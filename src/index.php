<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/style_a.css">
    <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
    <title>CyberBook</title>
</head>

<body>
    <header>
        <?php include "header.php" ?>
    </header>
    <section class="recherche">
        <form action="recherche.php" method="GET">
            <input style="width: 50em; height: 40px;" type="search" name="q" placeholder="Recherche...">
            <input class="button" type="submit" value="Recherche">
        </form>
</body>

</html>
