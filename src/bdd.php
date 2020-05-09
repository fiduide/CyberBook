<?php
	try
		{
			// On se connecte à MySQL
			$bdd = new PDO('mysql:host=localhost;dbname=biblio;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
	catch(Exception $e)
		{
			// En cas d'erreur, on affiche un message et on arrête tout
		 die('<p style="text-align: center;margin: 0px; font-size: 30px; color: white;background-color: red;">Erreur : la base de donnée n\'est pas disponible...</p>');
		}
	// Si tout va bien, on peut continuer
?>