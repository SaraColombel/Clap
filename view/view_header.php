<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">
    <link href="./style/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>#</title>
</head>

<body>
    <!-- Début de la navbar -->
    <!-- <nav class="navbar container-fluid sticky-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid ps-4">
            <div class="row align-item-center">
                <div class="col-3 d-flex align-items-center">
                    <a class="navbar-brand text-warning" href="controler_accueil.php"><img style="width:35%"
                            src="./img/logo2.png"></a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="col-6 collapse navbar-collapse text-center ps-2" id="navbarSupportedContent">
                    <div class="col-6">
                        <ul class="navbar-nav">
                            <li class="nav-item me-2">
                                <a class="nav-link <?php echo $displayAccueil ?> g-0" aria-current="page"
                                    href="controler_accueil.php">Accueil</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link <?php echo $displayFilms ?>" href="controler_films.php">Films</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link <?php echo $displaySeries ?>" href="#">Séries</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link <?php echo $displayBlog ?>" href="controler_blog.php">Blog</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link <?php echo $displayContact ?>"
                                    href="controler_contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <div class="col ms-4">
                        <form class="d-flex" role="search">
                            <div class="col-9 me-2">
                                <input class="form-control me-2" type="search" placeholder="Rechercher"
                                    aria-label="Search">
                            </div>
                            <div class="col-3">
                                <button class="btn btn-outline-warning " type="submit">Voir</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col d-flex">
                    <a class="nav-link" href="controler_deco.php">
                        <i class="bi bi-box-arrow-right" style="font-size : 40px; color: white; display: <?php echo $deconnexion ?>;"></i>
                    </a>

                    <a href="controler_user.php">
                        <i class="bi bi-person-circle"
                            style="font-size : 40px; color : <?php echo $colorContact ?>;"></i>
                    </a>
                </div>
            </div>

        </div>


    </nav> -->

    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid pe-0">
            <div class="row d-flex justify-content-between align-items-center w-100">
                <!-- Logo -->
                <div class="col-3">
                    <a class="navbar-brand text-warning" href="controler_accueil.php">
                        <img class="w-25" src="./img/logo2.png" alt="Logo">
                    </a>
                </div>

                <!-- Bouton Toggle pour menu responsive -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="col-6 d-flex pe-0">
                    <!-- Menu Navbar (liens de navigation) -->
                    <div class="col-2 collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item me-2">
                                <a class="nav-link <?php echo $displayAccueil ?>" aria-current="page"
                                    href="controler_accueil.php">Accueil</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link <?php echo $displayFilms ?>" href="controler_films.php">Films</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link <?php echo $displaySeries ?>" href="#">Séries</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link <?php echo $displayBlog ?>" href="controler_blog.php">Blog</a>
                            </li>
                            <li class="nav-item me-2">
                                <a class="nav-link <?php echo $displayContact ?>"
                                    href="controler_contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Formulaire de recherche -->
                    <div class="col ms-2 d-flex justify-content-start">
                        <form class="d-flex w-100" role="search">
                            <!-- Largeur de la barre de recherche ajustée -->
                            <input class="form-control me-2" type="search" placeholder="Rechercher" aria-label="Search">
                            <button class="btn btn-outline-warning" type="submit">Voir</button>
                        </form>
                    </div>
                </div>


                <!-- Icônes de déconnexion et profil -->
                <div class="col d-flex justify-content-end text-end">
                    <a class="nav-link" href="controler_deco.php">
                        <i class="bi bi-box-arrow-right"
                            style="font-size: 40px; color: white; display: <?php echo $deconnexion ?>;"></i>
                    </a>

                    <div class="mx-3"></div>

                    <a href="controler_user.php">
                        <i class="bi bi-person-circle" style="font-size: 40px; color: <?php echo $colorContact ?>;"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Fin navbar -->