<?php

include("../connexionbdd.php"); 
if(isset($_GET['id']) AND !empty($_GET['id'])){ //si l'id est défini et qu'il n'est pas vide
    $getid = $_GET['id']; //on récupère l'id
    $recupUser = $bdd->prepare('SELECT * FROM membres WHERE id = ? '); //on sélectionne toutes les infos du membre
    $recupUser->execute(array($getid)); //on exécute la requête
    if($recupUser->rowCount() > 0){ //si il y a au moins 1 utilisateur

        $bannirUser = $bdd->prepare('DELETE FROM membres WHERE id = ?'); //on supprime le membre
        $bannirUser->execute(array($getid)); //on exécute la requête

        header('Location: membresadmin.php');
    }else{ //si il n'y a pas d'utilisateur
        "Ce membre est introuvable"; //message d'erreur
    }
}else{ //si l'id n'est pas défini
    echo "L'id n'a pas été récuperer."; //message d'erreur
}

?>