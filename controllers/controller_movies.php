<?php
$displayFilms = "active";


if(isset($_SESSION['id_utilisateur'])){
    $colorContact = '#ffc107';
} else if (!isset($_SESSION['id_utilisateur'])){
    $colorContact = 'white';
}

// include './views/view_header.php';
// include './views/view_movies.php';
// include './views/view_footer.php';