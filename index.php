<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    

    <title>L'Association.</title>
  </head>
  <body class="bodysite">
    <div class="cursor"></div>
    
  <?php
include("entete.php");
?>


<!--Hero header-->
<div class="hero vh-100 d-flex align-items-center" id="home">
    <div class="container">
        <div class="row">
         
            <div class="col-lg-7 mx-auto text-center"> <!--On centre les éléments de la div-->
                <h1 class="display-4">Bienvenue sur le site de l'Association.</h1>
                <p class="text-danger my-4">Ici vous retrouverez les plus grands héros du monde ainsi que les plus grands vilains (sous les verrous)!</p>
            </div>
        </div>
    </div>
</div>
<!--Fin du Hero Header-->

<!--le corps-->
<section class="site">
    <div class="row">
       <div class="col-8" id="indexgauche">
           <h1 class="excelsiortitre">Excelsior !</h1>
            <p class="textexcelsior">C'est avec cette fameuse phrase de Stan Lee que l'on vous accueille sur ce site.<br>
             Vous retrouverez ici notre selection de héros et de vilains préférés.<br>
             N'oubliez pas : de grands pouvoirs implique de grandes responsabilités !</p> 
                <img class="excelsior" src="imgs/excelsior.jpg">

       </div>
       <div class="col-2" id="indexdroit">
           <h3>A propos</h3>
                <p>Bienvenue sur le site de l'Association. Ce site est en pleine évolution, n'hésitez pas à revenir souvent !</p>
           
           <h4>Nos réferences :</h4>
           <a href="https://www.marvel.com/" target="_blank">Le site officiel Marvel !</a><br>
           <a href="https://marvel.fandom.com/fr/wiki/Marvel_Wiki" target="_blank">Le Wiki Fandom Marvel !</a>
       </div>
</section>

<?php
include("footer.php");
?>


  </body>
</html>
