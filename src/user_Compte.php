<?php
session_start();
include "bdd.php";

if($_SESSION['group'] != 'admin' && $_SESSION['group'] != 'membre'){ //Si session est vide alors c'est un visiteur sans connection
    $_SESSION['group'] = 'visiteur';
    include "header.php";
    echo '<h1 style="text-align:center; color: red; margin-top: 3em;">Vous devez être connecté pour accéder à cette page</h1>';
}
else {
    $req= $bdd->query('SELECT * FROM visiteurs WHERE ID = '.$_SESSION['id'].'');
    $req = $req->fetch();


    if (!empty($_POST['email']) && !empty($_POST['tel']) && !empty($_POST['mdp'])){
        $email = htmlspecialchars($_POST['email']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $tel = htmlspecialchars($_POST['tel']);
        $ID = $_SESSION['id'];
        $modif = $bdd->prepare('UPDATE visiteurs SET email = ?, mdp = ?,  telephone = ?
        WHERE ID = ?');
        $modif -> execute(array(
        $email,
        $mdp,
        $tel,
        $ID
        ));

        echo '<p style="text-align:center; margin: 0px; font-size: 30px; color: white;background-color: green;">Votre compte a bien été modifié</p>';
        $from= "CyberBook@biblio.fr" . "\r\n";
        $to = $email; //Mettre le destinataire ou l'on veut recevoir le message
        $subject="Confirmation d'inscription";
        $headers="From : ".$from;
        //Affichage du message a envoyer
        $message =
        "<html>
        <head>
        <title>Hey</title>
        </head>
        <a href='https://cyberbook-ipssi.000webhostapp.com/index.php'>
        <header style='margin-bottom: 10px;'>
        <div style='height: 350px;width: 100%;position: relative;'>
			<img style='width: 100%;height:50%; position: relative;' src='https://firebasestorage.googleapis.com/v0/b/test-df0b6.appspot.com/o/logo.png?alt=media&token=419c8afd-c593-48b4-8621-4231b7bb8b9a'>
			<div class='position: absolute;bottom: 0;background: 0 0;height: 60px;width: 100%;-webkit-filter: blur(7px);'>
				<svg width='100%' height='100%' viewBox='0 0 100 100' preserveAspectRatio='none'>
					<path d='M0 100 L 0 0 C 25 100 75 100 100 0 L 100 100' fill='black'></path>
				</svg>
			</div>
        </header>
        </a>
        <body style='padding: 0%; margin: 0; font-family: Helvetica, Arial , sans-serif'>
            <div style='background: #f7f7f7; padding: 5% 5% 5% 5%'>
                <div style='background: white; padding: 2%'>
                    <p style='text-align: center; font-size: 18px'><b>Bonjour ".$req['pseudo'].",</b></p><br/>
                    <span style='text-align: center; display: block; margin: auto'>
                        <p>Vous recevez ce mail car quelqu'un a modifié des paramètres de votre compte, Si jamais il ne s'agit pas de vous,
                        nous vous conseillons de le changer dans les plus bref délais en <a style ='text-decoration: none;' href='https://cyberbook-ipssi.000webhostapp.com/connexion.php'>cliquant ici</a></p>
                    </span>
                </div>
                <div style='background: white; color: #666; padding: 1%; border-radius: 0 0 10px 10px; padding-top: 20px'>
                    <b>
                        <span>© 2020 <a href='https://cyberbook-ipssi.000webhostapp.com/index.php' style='color:#666;outline:none;text-decoration: none;margin-bottom:5px'>CyberBook</a></span>
                    </b>
                </div>
            </div>
        </body>
    </html>";

    $headers .= "MIME-Version : 1.0" . "\r\n";
    $headers .= "Content-type:text/html; charset='utf-8'";

    mail($to, $subject, $message, $headers);
    }

    
    ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
	<link rel="stylesheet" type="text/css" href="css/style_compte.css">
	<link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
	<title>Mon Compte</title>
</head>
<body>
    <header>
        <?php include "header.php";?>
    </header>
    <div class="align">
        <section class="id_Compte">
            <div class="gauche">
                <figure style="text-align: center;">
                    <img src="img/utilisateur.png">
                    <figcaption style='text-align: center; font-size:30px; margin-top: 10px;'><?php echo $req['nom'] .'  '. $req['prenom'];?></figcaption>
                </figure>
            </div>
            <div style="margin-top: 1em; font-size: 20px;">
                <form onsubmit="return verifFormModifCompteUtilisateur();" action="user_Compte.php" method="POST">
                    <label><B>Pseudo</B> : <?php echo $req['pseudo']?></label><label style="margin-left: 20px"><B>Pénalitée(s)</B> : </label><?php echo $req['penalite']?><br>
                    <label><B>Email</B> : </label><input id="email" name="email" class="input2" type="email" value="<?=$req['email']?>"><br>
                    <label><B>Numéro de téléphone</B> : </label><input  name="tel" id="tel" class="input2" type="tel" style="width: 5em;" value="0<?=$req['telephone']?>"><br>
                    <label><B>Mot de passe</B> : </label><input  name="mdp" id="mdp" class="input2" style="width: 5em;" type="password" value="<?=$req['mdp']?>"><br>
                    <label><B>Confirmation du mot de passe</B> : </label><input id="mdpConfirm" class="input2" style="width: 5em;" type="password" value="">
                    <input class="button2" type="submit" value="Enregistrer">
                </form>
            </div>
        </section>
    </div>
</body>
</html>


    <?php
}
?>

