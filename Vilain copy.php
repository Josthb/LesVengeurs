<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylessheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    

    <title>Vilains</title>
</head>

<body class="bodysite">


<?php
include("entete.php");
?>



    <!--Vilains PERMA-->
    <section class="site" id="vilains">
        <div class="container-">
            <div class="row">
                <div class="col-7">

                    <h1 id="titrevilain">Les plus dangereux supers vilains</h1>
                    <p id="pblanc">Voici le top 6 du classement</p>
                </div>
            </div>
    <!--FIN HEROS PERMA-->
<?php

include("connexionbdd.php");

$req = $bdd->prepare('SELECT * FROM personnages where idCateg=2'); //on sélectionne toutes les infos du personnage quand l'idCateg = 2
$req->execute(); //on exécute la requête
$vilains = $req->fetchAll(); //on récupère les infos du personnage

$n = 1; //on initialise le compteur à 1
foreach($vilains as $vilain){ //on parcourt la liste des personnages
    $id = $vilain['idHeros']; //on récupère l'id du personnage
    $img = $vilain['imgHeros']; //on récupère l'image du personnage
    $titre = $vilain['TitreHeros']; //  on récupère le titre du personnage
    $desc = $vilain['DescHeros']; //on récupère la description du personnage

    if($n == 1){ //si le compteur est égal à 1
        echo '<div class="row">'; //on ouvre la div row
    }
    echo "<div class='col-3'>";
    echo "<div class='projet'>";
    echo "<a href='detailPerso.php?id=",$id,".'><img src='./img/$img' id='intro3'></a>"; //on affiche l'image du personnage qui donne accès à la page detailPerso.php
    echo "<div class='overlay'>";
    echo "<h4 class='text-white' id='titrevilain'>$titre</h4>";
    echo "<h6 class='text-white' id='vilainstexte'>$desc</h6>";
    echo "</div>";
    echo "</div>";
    echo "</div>";

    if ($n == 3){ //si le compteur est égal à 3
        echo '</div>';//on ferme la div row et on passe à la ligne suivante
        $n = 0; //on remet le compteur à 0
    }

    $n++; //on incrémente le compteur

}

if ($n != 1){ //si le compteur n'est pas égal à 1
    echo '</div>'; //on ferme la div row

}

?>
    
<!--Footer-->
<?php

include("footer.php");
?>
<!--Fin du Footer-->



</body>

</html>