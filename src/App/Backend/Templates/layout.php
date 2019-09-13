<?php
 $allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
 $allowedTags.='<li><ol><ul><span><div><br><ins><del>';

  if($_POST['elm1']!='') {
    $sHeader = '<h1>Ah, content is king.</h1>';
    $sContent = strip_tags(stripslashes($_POST['elm1']),$allowedTags);
} else {
    $sHeader = '<h1>Nothing submitted yet</h1>';
    $sContent = '<p>Start typing...</p>';
    $sContent.= '<p><img width="107" height="108" border="0" src="/mediawiki/images/badge.png"';
    $sContent.= 'alt="TinyMCE button"/>This rover has crossed over</p>';
  }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="description" content="Découvrez chaque semaines un nouveau chapitre du futur roman &laquo;Billet simple pour l'Alaska&raquo; de Jean Forteroche. Une aventure pleine de rebondissement sur la terre du soleil de minuit."> <!-- A compléter -->
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro:400,500|Raleway:400,400i,700,700i&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/images/favicon/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/images/favicon/favicon.png" type="image/png">
    <link rel="icon" sizes="32x32" href="/images/favicon/favicon-32.png" type="image/png">
    <link rel="icon" sizes="64x64" href="/images/favicon/favicon-64.png" type="image/png">
    <link rel="icon" sizes="96x96" href="/images/favicon/favicon-96.png" type="image/png">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css" type="text/css"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <?php
    if (isset($_SESSION['auth']) && $_SESSION['auth'] === true) {
         require 'Parts/navigation.php';
    }
    ?>
    <?php if ($user->hasFlash()) echo '<script>alert("'.$user->getFlash().'");</script>'; ?>
    <?= $content ?>
</body>

</html>

<script src="https://kit.fontawesome.com/31d8dde4e9.js"></script>
<script language="javascript" type="text/javascript" src="/tinymce/tinymce.min.js"></script>
<script language="javascript" type="text/javascript">
    tinyMCE.init({
        theme : "silver",
        mode: "exact",
        elements : "elm1",
        theme_advanced_toolbar_location : "top",
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
            + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
            + "bullist,numlist,outdent,indent",
        theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
            +"undo,redo,cleanup,code,separator,sub,sup,charmap",
        theme_advanced_buttons3 : "",
        force_br_newlines : true,
        force_p_newlines : false,
        forced_root_block : '',
        height:"350px",
        width:"100%"
    });
</script>
