<?php
session_start();
include("connexionbdd.php"); //include de la connexion à la base de données

include_once('cookieconnect.php'); //include de la fonction qui permet de se connecter automatiquement avec un cookie

if(isset($_SESSION['id'])) //si l'id existe
{
        $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?"); //on prépare la requête
        $requser->execute(array($_SESSION['id'])); //on exécute la requête
        $user = $requser->fetch(); //on récupère les données de la requête

        if(isset($_POST['newpseudo']) /* si newpseudo existe */ AND !empty($_POST['newpseudo']) /* qu'il n'est pas vide */ AND $_POST['newpseudo'] != $user['pseudo']) //et qu'il est différent du précédent pseudo alors on lance la partie du code qui suit
        {
            $newpseudo = htmlspecialchars($_POST['newpseudo']); //on récupère le pseudo saisi dans le formulaire
            $insertpseudo = $bdd->prepare("UPDATE membres SET pseudo = ? WHERE id = ?"/* l'id est nécessaire ici afin de ne pas modifier l'entiereté des profils mais seulement celui concerné */);  //on prépare la requête
            $insertpseudo->execute(array($newpseudo, $_SESSION['id'])); //on exécute la requête qui prend en parametre le pseudo saisi et l'id de l'utilisateur
            header("Location: profil.php?id=".$_SESSION['id']); //on redirige vers le profil de l'utilisateur mis à jour
        }

        if(isset($_POST['newemail']) /* si newmail existe  */ AND !empty($_POST['newemail']) /* qu'il n'est pas vide */ AND $_POST['newemail'] != $user['mail']) //et qu'il est différent du précédent mail alors on lance la partie du code qui suit
        {
            $newpseudo = htmlspecialchars($_POST['newpseudo']); //on récupère le pseudo saisi dans le formulaire
            $insertpseudo = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");  //on prépare la requête qui prend en parametre le mail saisi et l'id de l'utilisateur	
            $insertpseudo->execute(array($newpseudo, $_SESSION['id'])); //on exécute la requête qui prend en parametre le mail saisi et l'id de l'utilisateur
            header("Location: profil.php?id=".$_SESSION['id']); //on redirige vers le profil de l'utilisateur mis à jour
        }


        if(isset($_POST['newmdp1']) /* si newmdp1 existe */ AND !empty($_POST['newmdp1']) /* qu'il n'est pas vide  */ AND isset($_POST['newmdp2']) /* et que newmdp2 existe  */ AND !empty($_POST['newmdp2'])) //et qu'il n'est pas vide
        {
            $mdp1=sha1($_POST['newmdp1']); //on crypte le mot de passe saisi
            $mdp2=sha1($_POST['newmdp2']); //on crypte le mot de passe saisi

            if($mdp1 == $mdp2) //si les deux mots de passe sont identiques
            {
               $insertmdp = $bdd->prepare("UPDATE membres SET motdepasse = ? WHERE id = ?"); //on met à jour le mot de passe de l'utilisateur avec cette requête
               $insertmdp->execute(array($mdp1, $_SESSION['id'])); //on exécute la requête
                header("Location: profil.php?id=".$_SESSION['id']); //on redirige vers le profil de l'utilisateur mis à jour
            }
            else
            {
                $msg = "Vos deux mdp ne correspondent pas"; //si les deux mots de passe ne correspondent pas on affiche ce message d'erreura
            }
           
        }
       
        
    

?>





<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/inscription.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Profil</title>
</head>
<body>
    <div class="container">
        <div class="title">Edition de mon profil</div>
    
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="user-details">
                <div class ="input-box">
                    <span class="details">Pseudo :</span>
                    <input type="text" name="newpseudo" placeholder="Pseudo" value="<?php echo $user['pseudo'];  ?>"/> <!-- on met la valeur de la variable pseudo dans le champ de texte, on retrouve la valeur newpseudo -->
                </div>
                <div class ="input-box">
                    <span class="details">Mail :</span>
                    <input type="text" name="newemail" placeholder="Mail" value="<?php echo $user['mail'];  ?>"/> <!-- on met la valeur de la variable mail dans le champ de texte -->
                </div>
                <div class="input-box">
                    <span class="details">Mot de passe :</span>
                    <input type="password" name="newmdp1" placeholder="Mot de passe"/>
                </div>
                <div class="input-box">
                    <span class="details">Confirmation du mot de passe :</span>
                    <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe"/>
                </div>
                <div class="input-box">
                    <input type="submit" id="maj" value="Mettre à jour mon profil"> <!--permet de mettre à jour le profil -->
                </div>
                <div class="input-box">
                    <input type="submit" formaction="index.php" value="Retour au site">  <!--permet de revenir sur la page d'accueil -->
                </div>
            </div>
        </form>
        <?php if(isset($msg)) { echo $msg; } ?> <!--on affiche le message d'erreur si il existe --
    </div>
</body>
</html>
<?php
}
else
{
    header("Location: connexion.php"); //si l'id n'existe pas on renvoie vers la page de connexion
}
?>