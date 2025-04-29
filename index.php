<?php
declare(strict_types=1);

session_start();

include './utilitaire/env.php';

$page = $_GET['page'] ?? 'Accueil'; // Page par défaut

include './views/view_header.php';

switch ($page) {
    case 'Accueil':
        include './controllers/controller_home.php';
        include './views/view_home.php';
        break;

    case 'Films':
        include './controllers/controller_movies.php';
        include './views/view_movies.php';
        break;

    case 'Blog':
        include './controllers/controller_blog.php';
        include './views/view_blog.php';
        break;

    case 'Compte':
        include './controllers/controller_user.php';
        include './views/view_user.php';
        include './models/model_user.php';
        include './managers/manager_user.php';
        include './utilitaire/functions.php';
        break;

    case 'Quizz':
        include './controllers/controller_quizz.php';
        include './views/view_quizz.php';
        break;

    case 'Deconnexion':
        include './controllers/controller_deco.php';
        break;

    case 'Contact':
        include './controllers/controller_contact.php';
        include './views/view_contact.php';
        include './utilitaire/functions.php';
        include './models/model_contact.php';
        include './managers/manager_contact.php';
        break;

    case 'Administrateur':
        include './controllers/controller_admin.php';
        include './views/view_admin.php';
        break;

    default:
        include './views/view_404.php';
        break;
}

include './views/view_footer.php';