<?php
include "bdd.php";
if(!empty($_POST['email']) && !empty($_POST['pseudo']) && !empty($_POST['mdp'])&& !empty($_POST['nom'])&& !empty($_POST['prenom'])&& !empty($_POST['tel'])) {
    $email = $_POST['email'];
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['mdp'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['tel'];

    $doublepseudo= $bdd->query('SELECT * FROM visiteurs WHERE pseudo = "'.$pseudo.'"'); //recup des pseudos
    $dsp = $doublepseudo->fetch();
    $doublemail= $bdd->query('SELECT * FROM visiteurs WHERE email = "'.$email.'"');
    $dem = $doublemail->fetch();

    if($pseudo == $dsp['pseudo']){ //On vérifie que le pseudo rentré n'est pas déjà dans la base de donnée pour éviter les doublons
        echo '<p style="text-align:center; margin: 0px; font-size: 30px; color: white;background-color: red;">l\'identifiant est déjà utilisé</p>';

    }else if($email == $dem['email']){ //On vérifie que l'email rentré n'est pas déjà dans la base de donnée pour éviter les doublons
        echo '<p style="text-align:center; margin: 0px; font-size: 30px; color: white;background-color: red;">l\'email est déjà utilisé </p>';
    }
    else{ //si tout est bon alors on l'ajoute à la base de donnée
    $req = $bdd -> prepare('INSERT INTO visiteurs (pseudo, email, mdp, nom, prenom, telephone, rôle, penalite) VALUE (?,?,?,?,?,?, "membre", 0)');
    $req -> execute(array(htmlspecialchars($pseudo), htmlspecialchars($email), htmlspecialchars($mdp), htmlspecialchars($nom), htmlspecialchars($prenom), htmlspecialchars($telephone)));
    echo '<p style="text-align:center; margin: 0px; font-size: 30px; color: white;background-color: green;">Vous êtes maintenant inscrit</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="css/style_compte.css">
    <link href="https://fonts.googleapis.com/css?family=Homenaje&display=swap" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="img/accueil.png" />
    <title>Inscription</title>
</head>
<body>
<?php
include "header.php";
?>
<section>

    <fieldset  style="margin-top: 3em; border-radius: 10px; font-size: 25px; margin-left: 15em; margin-right: 15em;">
        <legend><strong><em>Inscription</em></strong></legend>
            <form onsubmit="return verifRegister()" class="formulaire" action="register.php" method="POST">
                <label for="email"> * Email</label> : <input  class="input" type="text" name="email" id="email" placeholder=" " /><br /><br />
                <label for="pseudo"> * Identifiant</label> : <input  class="input" type="text" name="pseudo" id="pseudo" placeholder=" "/><br /><br />
                <label for="mdp"> * Mot de passe</label> :  <input  class="input" type="password" name="mdp" id="mdp" placeholder=" "/><br /><br />
                <hr><br>
                <label for="nom"> * Nom</label> :  <input  class="input" type="text" name="nom" id="nom" placeholder=" "/><br /><br />
                <label for="prenom"> * Prénom</label> :  <input  class="input" type="text" name="prenom" id="prenom" placeholder=" "/><br /><br />
                <label for="tel"> * Numéro de téléphone</label> :  <input  class="input" type="tel" name="tel" id="tel" placeholder=" "/><br /><br />
                <input style="text-align: center;color: #9683EC;" class="button" type="submit" value="Inscription" />
                <a href="connexion.php"><input class="button" type="button" value="Retour"></a><br />
               <?php
                    if(empty($_POST['email']) && empty($_POST['pseudo']) && empty($_POST['mdp']) && empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['tel'])) {
                        echo '<p style="text-align:center; font-size: 13px; color: red;">Vous devez remplir tous les champs possédant une étoile </p>';
                    }
                ?>
            </form>
    </fieldset>
</section>

<br><br><br><br>
</body>
</html>