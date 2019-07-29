<?php
require "vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="description" content=""> <!-- A compléter -->
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro:400,500|Raleway:400,400i,700,700i&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link href="public/css/style.css" rel="stylesheet" />
    <!--Ajouter les icon-->
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

</head>

<body>
    <nav class="navbar navbar-expand-md sticky-top navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="public/images/Logo.png" id="logo" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">A propos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header>
        <div id="title">
            <h1>Un billet simple pour l'Alaska</h1>
            <p id="subtitle">De Jean Forteroche</p>
        </div>
    </header>
    <?= $content ?>
    <footer>

    </footer>
</body>

</html>