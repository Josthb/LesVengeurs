<?php
include("../connexionbdd.php"); 


if(isset($_FILES['img'])){  //si il y a un fichier dans le formulaire
    $extension = strtolower(substr(strrchr($_FILES['img']['name'],'.'),1));  //strlower pour mettre en minuscule, substr pour enlever le . et strrchr pour chercher le dernier . et cela permet de récupérer l'extension du fichier
    $extensions_autorisees = array('png','jpg', 'jpeg'); //extensions autorisées

    $fileName = $_FILES['img']['name']; //nom du fichier
    $fileName = str_replace('.'.$extension, '', $fileName); //on enlève l'extension du nom du fichier

    if(in_array($extension, $extensions_autorisees)){ //si l'extension est autorisée
        $chemin = '../img/'.$fileName.'.'.$extension; //chemin du fichier

        move_uploaded_file($_FILES['img']['tmp_name'], $chemin); //on déplace le fichier dans le dossier img
        $req = $bdd->prepare("INSERT INTO personnages (imgHeros, TitreHeros, DescHeros, HistoireL, idCateg) values (?,?,?,?,?)"); //on insère les infos du personnage dans la bdd
        $req->execute([$_FILES["img"]["name"], $_POST["titre"], $_POST["desc"], $_POST["histoireL"], $_POST["idCateg"]]); //on exécute la requête

        header('Location: ../index.php'); //on redirige vers la page index.php
    }
}

?>