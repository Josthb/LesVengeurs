<?php

include("../connexionbdd.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/publierperso.css">
    <title>Ajouter un personnage</title>
</head>
<body>
    <div class="container">
        <div class="title">Publier un personnage</div><br>
        <form action="addperso.php" method="POST" enctype="multipart/form-data"> <!--on crée un formulaire qui va envoyer les données vers addperso.php-->
            <div class="user-details">
                <div class="input-box1">
                    <span class="details">Mettre une image du personnage :</span> 
                    <input type="file" id="photo" name="img" accept=".png,.jpg,.jpeg"> <!--on accepte les extensions png, jpg et jpeg-->
                </div>
                <div class="input-box"> 
                        <span class="details">Saisir le titre du personnage :</span>
                        <input type='text' name='titre'  value="">
                </div>
                <div class="input-box">
                        <span class="details">Saisir la description du héros :</span>
                        <input type='text' name='desc' placeholder='description'>
                </div>
                <div class="input-box">
                        <span class="details">Histoire longue du personnage :</span>
                        <input type="text" name="histoireL" placeholder="Histoire longue">
                </div>
                <div class="input-box">
                    <span class="details">Id du personnage :</span>
                    <input type="text" name="idCateg" placeholder="1 (Gentil) ou 2 (Méchant)">
                </div>
                <div class="input-box">
                            <input type="submit" value="MAJ">
                </div>
                <div class="input-box">
                         <input type="reset" value="Annuler">
                </div>
            </div>   
        </form>
</body>
</html>
