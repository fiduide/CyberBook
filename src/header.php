<?php
session_start();



 ?>


<link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <header style="margin-bottom: 10px;">
		<div class="header">
			<img class="logo" src="img/logo.png" >
			<div class="header_mask">
				<svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
					<path d="M0 100 L 0 0 C 25 100 75 100 100 0 L 100 100" fill="black" ></path>
				</svg>
			</div>
			<nav class="menu">
				<ul>
					<li><a href="ListeL.php">Livres</a></li>
					<li><a href="Auteur.php">Auteurs</a></li>
					<li><a href="index.php">Accueil</a></li>
					<?php
					if( !empty($_SESSION['group']) && $_SESSION['group'] == "admin" ){ //Compte admin
					?>
						<li><a href="#">Ajout</a>
							<ul class="submenu">
								<li><a href="AjoutL.php">Livre</a></li>
								<li><a href="AjoutA.php">Auteur</a></li>
								<li><a href="Ajout_G.php">Genre</a></li>
								<li><a href="Ajout_Edi.php">Editeur</a></li>
							</ul>
						</li>         
						<li><a href="#">Favoris</a></li>
						<li><a href="admin.php">Admin</a></li>
						<li><a href="deco.php">Deconnexion</a></li>
					<?php
					}else if(!empty($_SESSION['group']) &&  $_SESSION['group'] != "admin" ){
						?>
						<li><a href="#">Ajout</a>
							<ul class="submenu">
								<li><a href="AjoutL.php">Livre</a></li>
								<li><a href="AjoutA.php">Auteur</a></li>
								<li><a href="Ajout_G.php">Genre</a></li>
								<li><a href="Ajout_Edi.php">Editeur</a></li>
							</ul>
						</li>         
						<li><a href="#">Favoris</a></li>	
						<li><a href="deco.php">Deconnexion</a></li>
					<?php
						}else{
							?>
							<li><a href="connexion?php" title="Pour ajouter de nouveau livre vous devez être connecté">Connexion</a></li>
							<?php
						}
					 ?>
					
				</ul>
			</nav>	
		</div>
	</header>
	<br>
	<br>






<style>
.header {
	height: 350px;
	width: 100%;
	position: relative;
}

.logo{
	width: 100%;
	height:99.5%;
	position: relative;

	
}

.header_mask{
	position: absolute;
	bottom: 0;
	background: 0 0;
	height: 60px;
	width: 100%;
	-webkit-filter: blur(7px);
}

/*Pour les liens toujours afficher du menu déroulant */
nav {
	width: 100%;
    display: inline-flex;
}

nav > ul {
 	margin: auto;
    padding: 5px;
 
}

nav > ul::after {
    content: "";
    display: block;
    clear: both; 
}

nav > ul > li {
    float: left;
    position: relative;
}

nav > ul > li > a {
    padding: 20px 30px;
    color: #FFF;
    font-size: 30px;
}

nav li {
    list-style: none;
    margin: 3px;
}

.submenu {
    display: none;
}

nav a {
    display: inline-block;
    text-decoration: none;
}

nav > ul > li:hover > a {
    border-top: 3px solid grey;
    padding: 17px 30px 20px 30px;
}

/*Pour dérouler les menus*/
nav li:hover .submenu {
    display: inline-block;
    position: absolute;
    top: 100%;
    left: 0px;
    padding: 0px;
    z-index: 1000;
}

.submenu li {
    border-bottom: 1px solid black;
    background-color: grey;
    margin: 0px;
    opacity: 0.8;
    
}
.submenu li:hover {
    border-bottom: 1px solid black;
    background-color: black;
    margin: 0px;
    opacity: 0.8;
}
.submenu li a {
    color: white;
    padding: 10px 30px;
    width: 100%;
    text-align: left;
    font-size: 20px;
}
/*fin menu déroulant*/    
    
    


body, html {
	margin: 0 ;
	padding: 0 ;
	background-color: #D4D3D3 ;
}
*{
	font-family: 'Homenaje', sans-serif;
}

</style>