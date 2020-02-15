<?php 
session_start();
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
<?php include "bdd.php"?>




<header >
<br>
<h4 style="text-align:center; margin-top: 4%; font-size: 15px;"><em>(Vous devez être connecté pour pouvoir ajouter des livres, auteurs, etc...)</em></h4>
    <section class="recherche">
        <form action="recherche.php" method="GET">
            <input style="width: 50em; height: 40px;" type="search" name="q" placeholder="Recherche de livre..."><br>
            <center><input class="button" type="submit" value="Recherche"><center>
        </form>
    </section>
<header>
<p style="text-align: center; font-size: 45px; text-decoration: underline;"><strong>Derniers ajouts...</strong></p>
<section>
    <?php
    $home = $bdd->query('SELECT * FROM livre LEFT JOIN auteur ON isbn = idLivre LEFT JOIN personne ON idPersonne = personne.id ORDER BY livre.id DESC LIMIT 2');
    ?>
    	<div class="align">
		<?php
		while ($h = $home->fetch()) //tant que tout n'est pas marqué continuer
		{
			$image = 'img/'.$h["isbn"].'.jpg';
			$image_par_defaut = 'img/0.png';
				?>
					<section class="idlivre">
						<a href="details_livre.php?titre=<?= ($h['titre']) ?>&amp;genre=<?= ($h['genre']) ?>" title="Afficher le détail du livre"> <!-- Permet de rediriger la donnée titre et genre vers la page détails-->
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
                    Plusieurs fonctions sont disponnible sur ce site, tel que la possibilité de consulter 
                    la liste de livre disponnible dans notre base de donnée mais également leurs informations.
                    De plus vous pouvez aussi ajouter vos propres livres, vos auteurs et même de nouveaux genres ou nouvelles langues !
                    
                </p>
            </div> 
        </section>

    </footer>
</body>

</html>
