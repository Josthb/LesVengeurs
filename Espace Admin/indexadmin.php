<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="../css/indexadmin.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="body">
    <div class="middle">
        <div class="menu">
            <li class="item" id="profile">
                <a href="#profile" class="btn"><i class='bx bxs-user-badge'></i>Profil</a>
                <div class="smenu">
                    <a href="#">admin</a>
                    <a href="#">admin1234</a>
                </div>
            </li>

            <li class="item" id="membres">
                <a href="#membres" class="btn"><i class='bx bxs-user-detail' ></i>Membres</a>
                <div class="smenu">
                    <a href="membresadmin.php">Les Membres</a>
                </div>
            </li>

            <li class="item" id="ajout">
                <a href="#ajout" class="btn"><i class='bx bxs-user-plus' ></i>Ajout</a>
                <div class="smenu">
                    <a href="publierperso.php">Ajout d'un perso</a>
                </div>
            </li>

            <li class="item">
                <a href="../index.php" class="btn"><i class='bx bxs-exit' ></i></i></i>Quitter</a>
            </li>
        </div>

    </div>
</body>
</html>