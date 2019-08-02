<?php
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'home') {
            home();
        } elseif ($_GET['action'] == 'chapter') {
            chapter();
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
        } elseif ($_GET['action'] == 'comentsPannelAdmin') {
            comentsPanelAdmin();
        }
    } else {
        home();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}

/* $mysqli = new mysqli('localhost:3306', 'root', 'example', 'Test');

/*
 * Ceci est le style POO "officiel"
 * MAIS $connect_error était erroné jusqu'en PHP 5.2.9 et 5.3.0.
 */
/*if ($mysqli->connect_error) {
    die('Erreur de connexion (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

/*
 * Utilisez cette syntaxe de $connect_error si vous devez assurer
 * la compatibilité avec les versions de PHP avant 5.2.9 et 5.3.0.
 */
/*deeif (mysqli_connect_error()) {
    die('Erreur de connexion (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Succès... ' . $mysqli->host_info . "\n";

$mysqli->close(); */
