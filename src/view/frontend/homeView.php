<?php $title = 'Accueil' ?>

<?php ob_start(); ?>

<h1>Hello World</h1>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>