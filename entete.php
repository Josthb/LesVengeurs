



<nav class="navbar navbar-expand lg-3 py-3 sticky-top navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img id="logo" src="imgs/logo.png" id="image1" href="#home">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Catégories
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="Heros copy.php">Héros</a></li>
                            <li><a class="dropdown-item" href="Vilain copy.php">Vilains</a></li>
                        </ul>
                      </li>
                    <li class="nav-item">
                        <a class="nav-link" href="comics.php">Comics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    
                </ul>
                <form action="inscription.php">
                    <!--le target blank permet d'afficher sur un autre onglet le lien inséré dans le action-->
                    <button class="btn btn-light ms-lg-3">Rejoins-nous !</button>
                </form>
            </div>
        </div>
    </nav>
    <!--Fin de la Navbar-->