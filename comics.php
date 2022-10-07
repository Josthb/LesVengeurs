
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    

    <title>Comics</title>
</head>
<body class="bodysite">



<?php
include("entete.php");
?>


<!--timeline-->
<section class="site">
    <div class="container">
        <div class="row">
                <h2 id="titrecomics">Les événements Marvel Comics !</h2>
        </div>
    </div>
  </div>
<div id="comics" class="container2">
    <div class="timeline">
        <ul>
            <li>
                <div class="timeline-content">
                    <h2 class="date">De 2000 à 2010.</h2>
                    <h1>Des évenements majeurs !</h1>
                    <p> La crise de colère de la Sorcière Rouge, la guerre de Nick Fury, Civil War ou encore World War Hulk. Voici ce qui alimenta les années 2000 dans les boutiques de comics, des évenements majeurs ayant une incidence sur le monde Marvel.<br>
                        <img class="imgtimeline" src="imgs/AvengersDisassembled.jpg"></p>
                </div>
            </li>
            <li>
                <div class="timeline-content">
                    <h2 class="date">De 2010 à 2014.</h2>
                    <h1>Le Chaos...</h1>
                    <p> Mort de héros iconiques, séparation de groupe d'anthologie... Les héros ne sont plus et laissent place au chaos.<br>
                        <img class="imgtimeline" src="imgs/mortwolfverine.jpg"></p>
                </div>
            </li>
            <li>
                <div class="timeline-content">
                    <h2 class="date">De 2015 à 2019.</h2>
                    <h1>La Guerre.</h1>
                    <p>Les X-men et les inhumains vont se livrer une bataille avec pour seul objectif : Survivre. Cependant ce n'est pas la seule chose, une menace bien plus dangereuse arrive.<br>
                        <img class="imgtimeline2" src="imgs/deathofx.jpg"></p>
                </div>
            </li>
            <li>
                <div class="timeline-content">
                    <h2 class="date">De 2019 à Aujourd'hui.</h2>
                    <h1>Entre retour de héros et invasion de Symbiotes</h1>
                    <p>Le retour de Dardevil, la fin du conflit des X-men et l'arrivée du roi des Symbiotes : Knull, redonnent un élan 
                        aux comics Marvels. Toujours plus bon et  toujours plus spectaculaire.<br>
                        <img class="imgtimeline2" src="imgs/clean.jpg">
                    </p>
                </div>
            </li>
        </ul>
    </div>
</div>
</section>

<!--fin de la Timeline-->

<?php

include("footer.php");

?>


</body>
</html>