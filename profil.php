<?php
session_start(); // on démarre la session
include("connexionbdd.php"); //include de la connexion à la base de données

include_once('cookieconnect.php'); //include de la fonction qui permet de se connecter automatiquement avec un cookie

if(isset($_GET['id']) AND $_GET['id'] > 0) //si l'id existe
{
    $getid = intval($_GET['id']); //intival permet de transformer la variable en entier, c'est une mesure de sécurité. On récupère l'id
    $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?'); //on prépare la requête
    $requser->execute(array($getid)); //on lance la requête
    $userinfo = $requser->fetch(); //on récupère les informations de l'utilisateur



?>


<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/indexadmin.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <title>Profil</title>
</head>
<body class="body">
    <div class="middle">
        <div class="menu">
            <li class="item" id="profile">
                <a href="#profile" class="btn"><i class='bx bxs-user-badge'></i>Profil de : <?php echo $userinfo['pseudo'] ; ?></a>
                <div class="smenu">
                    <a href="#">Pseudo : <?php echo $userinfo['pseudo'] ; ?></a> <!--on affiche le pseudo de l'utilisateur grace au echo-->
                    <a href="#">Mail : <?php echo $userinfo['mail'] ; ?></a> <!--on affiche le mail de l'utilisateur grace au echo-->
                </div>
            </li>

            <li class="item" id="membres">
                <a href="#membres" class="btn"><i class='bx bxs-user-detail' ></i>Editer</a>
                <div class="smenu">
                    <a href="editionprofil.php">Mon profil</a>
                </div>
            </li>


            <li class="item">
                <a href="deconnexion.php" class="btn"><i class='bx bxs-exit' ></i></i></i>Quitter</a>
            </li>
        </div>

        <?php
        if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']); 
        {
         ?>
        <?php
        }
        ?>
    </div>
</body>
</html>
<?php
}

?>