<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'home') {
            home();
        } elseif ($_GET['action'] == 'chapters') {
            chapters();
        } elseif ($_GET['action'] == 'about') {
            about();
        } elseif ($_GET['action'] == 'contact') {
            contact();
        } elseif ($_GET['action'] == 'login') {
            logIn();
        } elseif ($_GET['action'] == 'homeAdmin') {
            homeAdmin();
        } elseif ($_GET['action'] == 'chaptersPanelAdmin') {
            chaptersPanelAdmin();
        } elseif ($_GET['action'] == 'comentsPanelAdmin') {
            comentsPanelAdmin();
        }
    } else {
        home();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

/* phpinfo(); */

$link = mysqli_connect("db", "root", "example", "billet-simple");

if (!$link) {
    echo "Erreur : Impossible de se connecter à MySQL." . PHP_EOL;
    echo "Errno de débogage : " . mysqli_connect_errno() . PHP_EOL;
    echo "Erreur de débogage : " . mysqli_connect_error() . PHP_EOL;
    exit;
}

echo "Succès : Une connexion correcte à MySQL a été faite! La base de donnée my_db est génial." . PHP_EOL;
echo "Information d'hôte : " . mysqli_get_host_info($link) . PHP_EOL;

mysqli_close($link);
