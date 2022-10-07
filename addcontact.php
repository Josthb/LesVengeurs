<?php
include ("connexion.php"); //include de la connexion à la base de données

$req = $bdd->prepare("insert into contact(NomCt, emailCt, SujetMess, Mess) values(?,?,?,?)"); //requête d'insertion dans la table contact
$req->execute([$_POST["nom"], $_POST["mail"], $_POST["sujet"], $_POST["message"]]); //exécution de la requête




header('Location: thx.php'); //redirection vers la page contact.php
?>