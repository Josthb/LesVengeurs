<?php

if (isset($_POST['valider'])){ //si on clique sur le bouton valider, cela execute la condition suivante
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdpadmin'])){ //si le pseudo et le mot de passe ne sont pas vides
        $pseudo_defaut = "admin"; //on définit le pseudo par défaut
        $mdp_defaut = "admin1234"; //on définit le mot de passe par défaut

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']); //on récupère le pseudo saisi
        $mdp_saisi = htmlspecialchars($_POST['mdpadmin']); //on récupère le mot de passe saisi

        if($pseudo_saisi == $pseudo_defaut AND $mdp_saisi == $mdp_defaut){ //si le pseudo et le mot de passe saisi sont égaux au pseudo et au mot de passe par défaut
            $_SESSION['mdpadmin'] = $mdp_saisi; //on enregistre le mot de passe dans la session
            header('Location: indexadmin.php'); //on redirige vers la page d'accueil
        }else{ //
            echo "Les informations saisies ne sont pas bonnes. "; //si les informations saisies ne sont pas bonnes, on affiche un message d'erreur
        }
    }else{ //si le pseudo et le mot de passe sont vides
        echo "Compléter tous les champs ! "; //on affiche un message d'erreur
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Espace de connexion admin</title>
</head>
<body class="adminbody">

<div class="login-box">
     <h4 align="center">Administrator Assembly ! </h4>

    <form method="POST" action="">

        <div class="textbox">
            <i class='bx bxs-user-check'></i>
            <input type="text" name="pseudo" autocomplete="off" placeholder="Pseudo"></br>
        </div>

    <div class="textbox">
        <i class='bx bxs-lock'></i>
        <input type="password" name="mdpadmin" placeholder="Mot de Passe">
    </div>
        
<input class="btn" type="submit" name="valider">

</div>
    </form>

</body>
</html>