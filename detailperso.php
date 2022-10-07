<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    
</head>

<?php
include("connexionbdd.php");

$id = $_GET["id"]; //on récupère l'id du personnage

$req = $bdd->prepare('SELECT * FROM personnages WHERE idHeros=?'); //on sélectionne toutes les infos du personnage

$req->execute([$id]); //on exécute la requête

$perso = $req->fetch(); //on récupère les infos du personnage

$id = $perso["idHeros"]; //on récupère l'id du personnage
$img = $perso["imgHeros"]; //on récupère l'image du personnage
$titre = $perso["TitreHeros"]; //on récupère le titre du personnage
$histoire = $perso["HistoireL"]; //on récupère l'histoire du personnage

include("entete.php");

echo "<body class='bodysite'>"; 
echo "<section class = 'site'>";
echo "<div class = 'container'>";
echo "<div class = 'row'>";
echo "<h2 id='titreironman'>$titre</h2>"; //on affiche le titre du personnage
echo "</div>";
echo "</div>";
echo "<img src='./img/$img' id='intro3' class='rounded mx-auto d-block'>"; //on affiche l'image du personnage
echo "<p>$histoire</p><br>"; //on affiche l'histoire du personnage
echo "<br/>";

include("footer.php");
?>

