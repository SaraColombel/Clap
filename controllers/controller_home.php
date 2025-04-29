<?php

$displayAccueil = "active";

if(isset($_SESSION['id_utilisateur'])){
    $colorContact = '#ffc107';
} else if (!isset($_SESSION['id_utilisateur'])){
    $colorContact = 'white';
}

// include './views/view_header.php';
// include './views/view_home.php';
// include './views/view_footer.php';
