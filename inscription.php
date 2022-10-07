<?php

include("connexionbdd.php"); //include de la connexion à la base de données

if(isset($_POST['forminscription'])) // isset() détermine si une variable est déclarée et est différente de null
{
    $pseudo = htmlspecialchars($_POST['pseudo']); // htmlspecialchars() convertit les caractères spéciaux en entités HTML 
    $mail = htmlspecialchars($_POST['mail']);
    $mail2 = htmlspecialchars($_POST['mail2']); 
    $mdp = sha1($_POST['mdp']);                  // sha1() est une fonction de hashage qui permet de chiffrer un mot de passe
    $mdp2 = sha1($_POST['mdp2']);

    //série de conditions pour vérifier que les champs sont remplis
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2'])) //cette série de conditions commencent si les champs sont remplis, (suite l.60)
    {
        $pseudolenght = strlen($pseudo); //strlen() est une fonction qui permet de connaitre la longueur d'une chaine de caractères
        if($pseudolenght <= 20) //le pseudo doit avoir moins de 20 caractères, sinon on affiche un message d'erreur (l.55)
        {
            if($mail==$mail2) //condition qui vérifie la correspondance avec les adresses mails rentrées, (suite l.50). Si c'est bon, on continue
            {
                if(filter_var($mail, FILTER_VALIDATE_EMAIL)) // permet de vérifier la validité d'une adresse mail, c'est un filtre de validation. Sinon (suite l.45). Si c'est bon, on continue
                {
                        $reqmail= $bdd->prepare("SELECT * FROM membres WHERE mail = ?"); //on sélectionne tout dans la table membres, et on cherche si le mail rentré est déjà présent dans la table
                        $reqmail->execute(array($mail)); //on execute la requête
                        $mailexist = $reqmail->rowCount(); //rowCount() est une fonction qui permet de compter le nombre de lignes retournées par la requête
                        if($mailexist == 0) //si le nombre de lignes est égal à 0, c'est que l'addresse email n'est pas dans la base de données, sinon (suite l.41)
                        {
                            if($mdp==$mdp2) //si les mots de passe correspondent, cela va lancer les étapes d'en dessous, sinon (suite l.37)
                            {
                                $insertmbr = $bdd->prepare("INSERT INTO membres(pseudo, mail, motdepasse) VALUES(?, ?, ?)"); //requête d'insertion dans la table membres
                                $insertmbr->execute(array($pseudo, $mail, $mdp)); //on execute la requête
                                $_SESSION['comptecree'] = "Votre compte a bien été créer"; //message de confirmation, il n'est pas visible suite à la redirection mais il est nécessaire si cette dernière n'est pas présente dans le code
                                header('Location: index.php');   //redirection vers la page d'accueil
                            }
                            else
                            {
                                $erreur = "Vos mots de passe ne correspondent pas"; //si les mots de passes ne correspondent pas on affiche ce message d'erreur
                            }
                        }
                        else{
                            $erreur = "Adresse mail déjà utilisée"; //si l'adresse mail est déjà utilisée on affiche ce message d'erreur
                        }
                    }
                    else{
                        $erreur = "Votre adresse mail n'est pas valide"; //si l'adresse mail n'est pas valide on affiche ce message d'erreur
                    }
            }
            else
            {
                $erreur = "Vos adresses mail ne correspondent pas"; // si les deux adresses mails ne correspondent pas, on affiche ce message d'erreur
            }
        }
        else
        {
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères"; //si il y a plus de 255 caractères dans le pseudo, on affiche ce message d'erreur
        }
    }
    else
    {
        $erreur = "Tous les champs doivent etre complétés !"; // et si ces champs ne sont pas remplis on affiche cette phrase
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
    <title>Inscription</title>
</head>
<body>
    <div class="container">
        <div class="title">Inscription</div>
        <form method="POST" action="">         <!-- method="POST" permet de préciser que le formulaire sera envoyé en POST, elle transmet les informations du formulaire vers la bdd -->
            <div class="user-details">
                <div class="input-box">
               
                        <span class="details">Pseudo <i class='bx bxs-rename'></i>:</span>
                        <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo;} ?>"/>  <!-- permet de laisser afficher les informations malgré une potentielle erreur dans l'inscription, c'est un gain de temps pour l'utilisateur -->
                </div>
                <div class="input-box">
                        <span class="details">Mail <i class='bx bxs-envelope'></i>:</span>
                        <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail;} ?>"/>
                </div>
                <div class="input-box">
                        <span class="details">Confirmation du Mail <i class='bx bxs-envelope'></i>:</span>
                        <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2;} ?>"/>
                </div>
                <div class="input-box">
                        <span class="details">Mot de passe <i class='bx bxs-key'></i>:</span>
                        <input type="password" placeholder="Votre mot de passe" id="mdp" name="mdp"/>
                </div>
                <div class="input-box">
                        <span class="details">Confirmation du Mdp <i class='bx bxs-key'></i>:</span>
                        <input type="password" placeholder="Confirmer votre mot de passe" id="mdp2" name="mdp2"/>
                </div>
                <div class="button">
                            <input type="submit" name="forminscription" value="Je m'inscris"> <!-- on retrouve ici le forminscription dans le bouton permettant d'envoyer les informations du compte dans la bdd  -->
                            <button type="submit" formaction="connexion.php">Connexion</button>
                            <button type="submit" formaction="Espace Admin/connexionadmin.php">Connexion Admin</button>
                </div>
            </div>
        </form>
        <?php
            if(isset($erreur)) // isset détermine si une variable est déclarée et est différente de null 
            {
                echo '<font color="red">'.$erreur."</font>"; //en fonction de l'erreur, le message établit plus haut et concernant l'erreur sera affiché
            }
        ?>
    </div>

</body>
</html>