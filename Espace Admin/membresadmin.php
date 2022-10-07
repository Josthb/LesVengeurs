<?php
include("../connexionbdd.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les membres</title> 
    <link rel="stylesheet" href="../css/membresadmin.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<div class="table">
        <div class="table_header">
        <p>Les Membres</p>
        <form action="indexadmin.php">
                   
            <button class="retour">Retour au Menu !</button>
        </form>
        </div>
    <!--Afficher les membres-->
    <div class="table_section">
    <?php
                $recupUsers = $bdd->prepare('SELECT * FROM membres'); //on sélectionne toutes les infos des membres
                $recupUsers->execute(); //on exécute la requête
                $membres = $recupUsers->fetchAll(); //on récupère les infos des membres

            ?>    
        <table>
            <thead>
                <tr>
                    <th>Pseudo : </th>
                    <th>Action : </th>
                </tr>
                
            

                    <?php
                    foreach($membres as $membre) { //on parcourt la liste des membres
                    echo "<tr>"; //on ouvre la ligne
                    echo "<td>".$membre['pseudo']."</td>"; //on affiche le pseudo
                    echo "<td><a href='bannir.php?id=".$membre['id']."' style='color: red; text-decoration: none;'>Bannir le membre</a><i class='bx bxs-trash-alt'></i></td>"; //on affiche le bouton de bannissement
                    echo "</tr>"; //on ferme la ligne
                    }
                    ?>
    
    <!--Fin de l'affichage-->
            </thead>
        </table>
    </div> 
</div>   
    
    
</body>
</html>