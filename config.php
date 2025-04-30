<?php
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    // En local, l'URL de base inclut /Clap
    define('BASE_URL', '/Clap');
} else {
    // Sur Ionos, l'URL de base est à la racine
    define('BASE_URL', '');
}
