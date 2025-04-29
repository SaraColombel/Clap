<?php
$displayQuizz = "active";

if(isset($_SESSION['id_utilisateur'])){
    $colorContact = '#ffc107';
} else if (!isset($_SESSION['id_utilisateur'])){
    $colorContact = 'white';
}

// include './views/view_header.php';
// include './views/view_quizz.php';
// include './views/view_footer.php';