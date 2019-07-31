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
        }
    } else {
        home();
    }
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
