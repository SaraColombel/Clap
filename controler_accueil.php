<?php
session_start();

$displayAccueil = "active";

if(isset($_SESSION['id_utilisateur'])){
    $colorContact = '#ffc107';
} else if (!isset($_SESSION['id_utilisateur'])){
    $colorContact = 'white';
}

include './view/view_header.php';
include './view/view_accueil.php';
include './view/view_footer.php';
