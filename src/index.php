<?php
session_start();
include "bdd.php";

//Resulats de la recherche
if(!empty($_GET['q'])){

$q = htmlspecialchars($_GET['q']); //Protection contre la saisie utilisateur
$articles = $bdd->query('SELECT * FROM livre LEFT JOIN genre ON genre.id = livre.genre LEFT JOIN editeur ON editeur.id = livre.editeur LEFT JOIN auteur ON idLivre = isbn LEFT JOIN personne ON idPersonne = personne.id WHERE isbn= "'.$q.'"  OR titre LIKE "%'.$q.'%" ');

		if($articles->rowCount() == 0){ // Si le résultat trouvé est inférieur à 0
			echo '<p style="text-align: center;margin: 0px; font-size: 30px; color: white;background-color: red;">Nous n\'avons trouvé aucun résultat à votre recherche</p>';
        }
    }

?>
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
<?php include "header.php" ?>
<header>
<br>

<?php if(empty($_SESSION['group'])){?>
<h4 style="text-align:center; margin-top: 4%; font-size: 15px;"><em>(Vous devez être connecté pour pouvoir réserver des livres...)</em></h4>
<?php } ?>

<section class="recherche">
        <form action="index.php" method="GET">
            <input style="width: 50em; height: 40px;" type="search" name="q" placeholder="Recherche de livre..."><br>
            <center><input class="button" type="submit" value="Recherche"><center>
        </form>
        <?php
        if(isset($_GET['q']) AND !empty($_GET['q'])) { //Si le champs recherche n'est pas vide alors fait la recherche
		if($articles->rowCount() > 0) {  // Si le nombre le résultat trouvé est supérieur à 0
		?>
			<div class="align">
			<?php
            while($a = $articles->fetch()){
                $image = 'img/'.$a["isbn"].'.jpg';
                $image_par_defaut = 'img/0.png';
                ?>
                <section class="idlivreR">
                            <a href="details_livre.php?isbn=<?= ($a['isbn']) ?>&amp;genre=<?= ($a['genre']) ?>"> <!-- Permet de rediriger la donnée titre et genre vers la page détails-->
                                <tr>
                                    <td>
                                    <?php
                                    if(is_file($image)){

                                        echo '<img class="iDR" src="'.$image.'">';

                                    }else {
                                        echo '<img class="iR" src="'.$image_par_defaut.'">';
                                    }

                                    echo '<B>'.$a["titre"]. '</B>'; //affichage des titres des livres
                                    echo '<p><em>Ecrit par ' . $a["prenom"] . ' - ' . $a["nom"] . '</em></p>';//affichage les prenoms et noms des auteurs
                                    echo '<p><em>Genre : '.$a["libelle"].'</em></p>';
                                    echo '<p><em>Editeur : '.$a["editeur"].'</em></p>';
                                        ?>
                                    </td>
                                <tr>
                            </a>
                        </section>
                        <?php
            }
    }
}

?>
    </section>
<header>
<p style="text-align: center; font-size: 45px; text-decoration: underline;"><strong>Derniers ajouts...</strong></p>
<section>
    <?php
    $home = $bdd->query('SELECT * FROM livre LEFT JOIN auteur ON isbn = idLivre LEFT JOIN personne ON idPersonne = personne.id ORDER BY livre.id DESC LIMIT 2');
    ?>
    	<div class="align">
		<?php
		while ($h = $home->fetch()) //tant que tous n'est pas marqué continuer
		{
			$image = 'img/'.$h["isbn"].'.jpg';
			$image_par_defaut = 'img/0.png';
				?>
					<section class="idlivre">
						<a href="details_livre.php?isbn=<?= ($h['isbn']) ?>&amp;genre=<?= ($h['genre']) ?>" title="Afficher le détail du livre"> <!-- Permet de rediriger la donnée titre et genre vers la page détails-->
							<tr>
								<td>
								<?php
									if(is_file($image)){
										echo '<img class="iD" src="'.$image.'">';
									}else {
										echo '<img class="i" src="'.$image_par_defaut.'"';
									}

									echo '<p><strong>'.$h["titre"]. '</strong></p>'; //affichage des titres des livres
									echo '<p><em>' . $h["prenom"] . ' - ' . $h["nom"] . '</em></p>';//affichage les prenoms et noms des auteurs
									?>
								</td>
							<tr>
						</a>
					</section>
	<?php
		}
	?>
	</div>
<section>


<hr> <!-- Barre horizontale pour séparer le footer du reste -->

    <footer>
        <section class="contener">
            <div class="footer">
                <img class="img_footer" src="img/book.png" alt="livre">
                <p>Vous trouverez ici un site projet fait par deux étudiants de l'école IPSSI. Ce site est cependant complètement fictif et à pour seul but d'acquérir diverses compétences en développement Web</p>
            </div>
            <div class="footer">
                <img class="img_footer"src="img/stylo.png" alt="stylo.png">
                <p>
                    Plusieurs fonctions sont disponible sur ce site, vous pouvez consulter
                    la liste de livre disponible dans notre base de donnée mais également leurs informations et la possibilité de les réserver.
                </p>
            </div>
        </section>

    </footer>
</body>
</html>
