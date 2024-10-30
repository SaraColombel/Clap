<?php
session_start();

session_destroy();
header('Location:controler_accueil.php');
exit;