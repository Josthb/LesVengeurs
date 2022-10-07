<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    

    <title>Contact</title>
</head>
<body class="bodysite">

<?php
include("entete.php");
include("connexionbdd.php");
?>

<!--Début de Contact-->
<section class="site" id="backgroundcontact">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-8 mx-auto text-center">
                <h6 class="text-warning">Contact</h6>
                <h1>Ici vous pouvez nous contacter !</h1>
                <p>Saisissez les informations nécessaires.</p>
            </div>
        </div>
    
        <form action="addcontact.php" class="row g-3 justify-content-center" method="post">
            <div class="col-md-5">
                <input type="text" class="form-control" placeholder="Nom Complet" name="nom">
            </div>
            <div class="col-md-5">
                <input type="email" class="form-control" placeholder="Ton email" name="mail">
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" placeholder="Quel est le sujet de ton message ?" name="sujet">
            </div>
            <div class="col-md-10">
                <textarea name="message" cols="30" rows="5" class="form-control" placeholder="message"></textarea>
            </div>
            <div class="col-md-10 d-grid">
                <button class="btn btn-warning" type="submit">Merci !</button>
            </div>
        </form>

    </div>
</section>
<!--Fin de Contact-->

<?php

include("footer.php")

?>


</body>
</html>


 