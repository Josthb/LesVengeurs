<?php

session_start(); // On démarre la session

setcookie('email','',time()-3600 ); // On supprime le cookie
setcookie('password','',time()-3600 ); // On supprime le cookie

$_SESSION = array(); // On détruit toutes les variables de session
session_destroy(); // On détruit la session
header("Location: connexion.php"); // On redirige vers la page de connexion


?>