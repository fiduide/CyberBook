<?php
session_start();
	if(empty($_SESSION['group'])){
		$_SESSION['group'] = "visiteur";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="javaScript.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style_detail.css">
	<link rel="stylesheet" type="text/css" href="css/style_ajout.css">
	<link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
	<title>Détails du livre</title>
</head>
<body>
<header>
	<?php include "header.php"?>
</header>
<br>
<br>
<br>

<?php include "bdd.php"?>
<?php
	$titre = $_GET['titre']; //Protection contre la saisie utilisateur et récupération de la variable titre

	$req = $bdd->query('SELECT * FROM livre LEFT JOIN genre ON livre.genre = genre.id LEFT JOIN editeur ON editeur.id = livre.editeur LEFT JOIN langue ON langue.id = livre.langue WHERE titre LIKE "'.$titre.'%"');
while ($d = $req->fetch()){
	$image = 'img/'.$d["isbn"].'.jpg';
	$image_par_defaut = 'img/0.png';
	echo '<h1 style="text-align:center;">Détail du livre <strong style="text-decoration: underline;">'.$d["titre"].'</strong></h1>';
	?>
	<div class="align">
		<section class="details_Livre">
			<?php
				if(is_file($image)){ //si l'image existe ou non

					echo '<img class="img" src="'.$image.'">';
				}else {
					echo '<img class="iD"src="'.$image_par_defaut.'">';
					}
				echo '<p class="det">';
				echo '<strong><u>ISBN</u></strong> : '.$d["isbn"]. '<br>'; //isbn
				echo '<strong><u>Genre</u></strong> : '.$d["libelle"]. '<br>'; //genre
				echo '<strong><u>Editeur</u></strong> : '.$d["editeur"]. '<br>'; //Editeur
				echo '<strong><u>Langue</u></strong> : '.$d["langue"]. '<br>'; //Editeur
				echo '<strong><u>Nombre de page</u></strong> : '.$d["nbpages"]. ' pages <br>'; //nbpages
				echo '<strong><u>Date de sortie</u></strong> : '.$d["annee"]. '<br>';
				if($_SESSION['group'] != 'admin'){
					if($d['stock'] == 0){
						echo '<strong><u>Nombre d\'exemplaire</u></strong> : Indisponible<br>'; //stock
					}else{
						echo '<strong><u>Nombre d\'exemplaire</u></strong> : '.$d["stock"]. '<br>'; //annee
					}
				}else{
					if($d['stock'] == 0){
						echo '<strong><u>Nombre d\'exemplaire</u></strong> : Indisponible'; //stock
						echo '<a href="addStock.php?isbn='.$d['isbn'].'"><img src="img/add.png"> <br/></a>';
					}else{
						echo '<strong><u>Nombre d\'exemplaire</u></strong> : '.$d["stock"]. '';
						echo '<a href="addStock.php?isbn='.$d['isbn'].'"><img src="img/add.png"> <br/></a>';
					}
				}



				if(($_SESSION['group'] == "membre" || $_SESSION['group'] == "admin") && $d['reservation'] != 1){
				?>
						<a class="button_RON" href="panier_tmp.php?isbn=<?= ($d['isbn'])?>">Réserver ce livre</a>
				<?php
					}else if(($_SESSION['group'] == "membre" || $_SESSION['group'] == "admin") && $d['reservation'] == 1 && $d['stock'] == 0){
				?>
						<a class="button_ROFF" href="#" title="Nous n'avons plus de stock" onclick="return ROOF()">Indisponible </a>
				<?php
					}
				?>
			</section>
		</div>

	<?php
	}

?>
</body>
</html>
