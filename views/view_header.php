<?php include './utilitaire/session_config.php' ?>

<!DOCTYPE html>
<html lang="fr" class="theme-light">

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
    <link rel="icon" type="image/png" href="./img/logo3.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />
    <title>CLAP</title>
</head>

<body>
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid pe-0">
            <div class="row d-flex justify-content-between align-items-center w-100">
                <!-- Logo -->
                <div class="col-3 ps-3">
                    <a class="navbar-brand text-warning" href="<?php echo BASE_URL; ?>/Accueil">
                        <img class="w-25" src="./img/logo2.png" alt="Logo">
                    </a>
                </div>

                <!-- Bouton Toggle pour menu responsive -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="col-6 d-flex pe-0 ps-0">
                    <!-- Menu Navbar (liens de navigation) -->
                    <div class="col-2 collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ps-2">
                            <li class="nav-item me-2">
                                <a class="nav-link <?php echo $displayAccueil ?>" aria-current="page"
                                    href="<?php echo BASE_URL; ?>/Accueil">Accueil</a>
                            </li>
                            <li class="nav-item me-2 ms-2">
                                <a class="nav-link <?php echo $displayFilms ?>" href="<?php echo BASE_URL; ?>/Films">Films</a>
                            </li>
                            <!-- <li class="nav-item me-2 ms-2">
                                <a class="nav-link <?php echo $displaySeries ?>" href="#">Séries</a>
                            </li> -->
                            <li class="nav-item me-2 ms-2">
                                <a class="nav-link <?php echo $displayBlog ?>" href="<?php echo BASE_URL; ?>/Blog">Blog</a>
                            </li>
                            <li class="nav-item me-2 ms-2">
                                <a class="nav-link <?php echo $displayQuizz ?>" href="<?php echo BASE_URL; ?>/Quizz">Quizz</a>
                            </li>
                            <li class="nav-item me-2 ms-2">
                                <a class="nav-link <?php echo $displayContact ?>"
                                    href="<?php echo BASE_URL; ?>/Contact">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Formulaire de recherche -->
                    <div class="col ms-2 d-flex justify-content-start">
                        <div class="position-relative w-100" style="max-width: 400px;" id="searchContainer">
                            <form class="d-flex w-100" role="search" id="searchForm">
                                <input class="form-control me-2" type="search" placeholder="Rechercher"
                                    aria-label="Search" id="searchInput">
                                <button class="btn btn-outline-warning" type="submit">Voir</button>
                            </form>

                            <!-- Résultats collés sous l'input -->
                            <div id="results" class="bg-dark rounded shadow"></div>
                        </div>
                    </div>
                </div>

                <!-- Thème sombre -->
                <!-- <div class="col d-flex justify-content-start">
                    <div class="toggler">
                        <label id="switch" class="switch">
                            <input type="checkbox" onchange="toggleTheme()" id="slider" aria-label="Changer le thème"
                                aria-checked="false">
                            <span class="slider round"></span>
                        </label>
                    </div>
                </div>
            </div> -->


                <!-- Icônes de déconnexion et profil -->
                <div class="col d-flex justify-content-end text-end">
                    <a class="nav-link" href="controller_deco.php">
                        <i class="bi bi-box-arrow-right <?php echo $deco_class ?>"
                            style="font-size: 40px; color: white; display: <?php echo $deconnexion ?>;"></i>
                    </a>

                    <div class="mx-3"></div>

                    <a href="<?php echo BASE_URL; ?>/Compte">
                        <i class="bi bi-person-circle" style="font-size: 40px; color: <?php echo $colorContact ?>;"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Fin navbar -->