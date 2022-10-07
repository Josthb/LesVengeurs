<?php
session_start();    // on démarre la session, ce qui permet de stocker des variables de session dans $_SESSION
include("connexionbdd.php");     //include de la connexion à la base de données

include_once('cookieconnect.php');              //include de la fonction qui permet de se connecter automatiquement avec un cookie

if(isset($_POST['formconnexion']))          //si le formulaire de connexion est envoyé
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);      //on récupère le mail, htmlspecialchar permet de sécuriser la requete
    $mdpconnect = sha1($_POST['mdpconnect']);                   //on récupère le mot de passe, sha1 est une fonction qui crypte le mot de passe
    if(!empty($mailconnect) AND !empty($mdpconnect))           //si les champs sont remplis, on lance les ordres qui suivent, sinon (suite l.38 )
    {
        //permet de voir si l'utilisateur existe dans la base de données
        $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?");    //on prépare la requête
        $requser->execute(array($mailconnect, $mdpconnect));       //on lance la requête
        $userexist = $requser->rowCount();      //on compte le nombre de lignes qui correspond à la requête

        //si l'utilisateur existe dans la base de données
        if($userexist == 1)    //si l'utilisateur existe on lance les ordres suivants sinon (suite l.33)
        {
            if(isset($_POST['souvenir'])){      //si l'utilisateur a coché la case "souvenir de moi"
                setcookie('email', $mailconnect, time()+365*24*3600,null,null,false,true);      //on crée un cookie pour l'email qui expirera dans 365 jours
                setcookie('password', $mdpconnect, time()+365*24*3600,null,null,false,true);    //on crée un cookie pour le mdp qui expirera dans 365 jours
            }
            $userinfo = $requser->fetch();                              //on récupère les informations de l'utilisateur
            $_SESSION['id'] = $userinfo['id'];                         //on crée une variable de session qui contient l'id de l'utilisateur
            $_SESSION['pseudo'] = $userinfo['pseudo'];                //on crée une variable de session qui contient le pseudo de l'utilisateur
            $_SESSION['mail'] = $userinfo['mail'];                   //on crée une variable de session qui contient le mail de l'utilisateur
            header("Location: profil.php?id=".$_SESSION['id']);     //on redirige vers la page profil avec l'id de l'utilisateur
        }
        else
        {
            $erreur = "Mauvais mail ou mot de passe";           //si l'utilisateur n'existe pas on affiche ce message
        }
    }
    else
    {
        $erreur = "Tous les champs doivent etre complétés !";    //si les champs ne sont pas remplis, on affiche un message d'erreur
    }
}


?>





<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/connexion_membre.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Connexion</title>
</head>
<body>
    <div class="center">
        <h2>Connexion</h2>
        <br /><br /><br />
        <form method="POST" action="">
            <div class="txt_field">
                <input type="email" name="mailconnect"/>
                <span></span>
                <label class="placeholder">Mail<i class='bx bxs-envelope'></i></label>
            </div>
            <div class="txt_field">
                <input type="password" name="mdpconnect" />
                <span></span>
                <label class="placeholder">Mot de passe<i class='bx bxs-key'></i></label>
            </div>
            <div classe="pass">
                <input type="checkbox" name="souvenir" id="remembercheckbox" /><label for="remembercheckbox">Se souvenir de moi</label>
            </div>
            <br>
            <input type="submit" name="formconnexion" value="Se connecter" />  <!-- Ici se trouve le bouton permettant d'envoyer le formulaire-->
            <button type="submit" formaction="index.php">Retour au site</button>
        </form>
        <?php
        if(isset($erreur)) //si la variable $erreur existe, on affiche le message d'erreur
        {
            echo '<font color="red">'.$erreur."</font>"; //on affiche le message d'erreur
        }

        ?>
    </div>
</body>
</html>