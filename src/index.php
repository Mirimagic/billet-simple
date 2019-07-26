<?php
require('controller/frontend.php');

try {
    Home();
} catch (Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
