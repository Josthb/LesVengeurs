<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/thx.css">
</head>

<?php

$message1 = 'Merci de votre message !'; //message de confirmation
$message2 = 'Vous serez redirigé dans quelques instants...'; //message de redirection

?>

<body>
    
    <h1 id="merci">
        <?php echo $message1 ?> 
    </h1>


    <p>
        <?php echo $message2 ?>
    </p>

    <img src="imgs/like2.gif" class="ironlike">

</body>

<?php
header('refresh:3;url=index.php'); //redirection vers la page index.php après 3 secondes
?>

</html>





