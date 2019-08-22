<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="description" content=""> <!-- A compléter -->
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro:400,500|Raleway:400,400i,700,700i&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/31d8dde4e9.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <!--Ajouter les icon--> 
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css" type="text/css"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <?php 
    if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
         require 'Parts/navigation.php';
    }
    ?>
    <?= $content ?>
</body>

</html>