<?php
	try
		{
			// On se connecte à MySQL
			$bdd = new PDO('mysql:host=localhost;dbname=biblio;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
	catch(Exception $e)
		{
			echo '<p style="text-align: center;margin: 0px; font-size: 30px; color: white;background-color: red;">Erreur : la base de donnée n\'est pas disponible...</p>';
		include 'header.php';	// En cas d'erreur, on affiche un message et on arrête tout

		 die('<p style="text-align:center; margin-top: 3em;">Erreur : ' .$e->getMessage(). '</p>');
		}
	// Si tout va bien, on peut continuer
?>