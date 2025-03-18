<?php
$deconnexion = "none";
$deco_class = "pointer_events-none";
$colorContact = 'white';

if(isset($_SESSION['id_utilisateur'])){
    $colorContact = '#ffc107';
    $deconnexion = "";
    $deco_class = "";
}