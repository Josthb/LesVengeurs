<?php
if(!isset($_SESSION['id']) AND isset($_COOKIE['email'],$_COOKIE['password']) AND !empty($_COOKIE['email'])AND !empty($_COOKIE['password'])){ //si l'utilisateur n'est pas connecté et qu'il a un cookie
    $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND motdepasse = ?"); // On prépare la requête pour sélectionner l'utilisateur
    $requser->execute(array($_COOKIE['email'], $_COOKIE['password'])); // On exécute la requête
    $userexist = $requser->rowCount(); // On compte le nombre d'utilisateur
    if($userexist == 1) //si l'utilisateur existe
    {
        $userinfo = $requser->fetch(); // On récupère les informations de l'utilisateur
        $_SESSION['id'] = $userinfo['id']; // On enregistre les informations de l'utilisateur dans la session
        $_SESSION['pseudo'] = $userinfo['pseudo']; // On enregistre les informations de l'utilisateur dans la session
        $_SESSION['mail'] = $userinfo['mail']; // On enregistre les informations de l'utilisateur dans la session
        
    }
}



?>