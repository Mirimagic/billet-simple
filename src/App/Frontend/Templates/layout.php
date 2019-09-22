<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Découvrez chaque semaines un nouveau chapitre du futur roman &laquo;Billet simple pour l'Alaska&raquo; de Jean Forteroche. Une aventure pleine de rebondissement sur la terre du soleil de minuit.">
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro:400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700,700i&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/images/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/images/favicon/favicon.png" type="image/png">
    <link rel="icon" sizes="32x32" href="/images/favicon/favicon-32.png" type="image/png">
    <link rel="icon" sizes="64x64" href="/images/favicon/favicon-64.png" type="image/png">
    <link rel="icon" sizes="96x96" href="/images/favicon/favicon-96.png" type="image/png">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css" type="text/css"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>
    <title><?= isset($title) ? $title : 'Billet simple pour l\'Alaska' ?></title>
</head>

<body>
    <?php require 'Parts/navigation.php'; ?>
    <?php require 'Parts/header.php'; ?>
    <?php if ($user->hasFlash()) echo '<script>alert("'.$user->getFlash().'");</script>'; ?>
    <?= $content ?>
    <?php require 'Parts/footer.php'; ?>
    <script src="https://kit.fontawesome.com/31d8dde4e9.js"></script>
</body>

</html>
