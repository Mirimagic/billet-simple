<?php
 $allowedTags='<p><strong><em><u><h1><h2><h3><h4><h5><h6><img>';
 $allowedTags.='<li><ol><ul><span><div><br><ins><del>';  
// Should use some proper HTML filtering here.
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
    <meta name="description" content=""> <!-- A compléter -->
    <link href="https://fonts.googleapis.com/css?family=Advent+Pro:400,500|Raleway:400,400i,700,700i&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/31d8dde4e9.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $title ?></title>
    <!--Ajouter les icon--> 
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css" type="text/css"/>
    <script language="javascript" type="text/javascript" src="src/vendor/tinymce/tinymce/tinymce.min.js"></script>
    <script language="javascript" type="text/javascript">
    tinyMCE.init({
        theme : "advanced",
        mode: "exact",
        elements : "elm1",
        theme_advanced_toolbar_location : "top",
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,separator,"
        + "justifyleft,justifycenter,justifyright,justifyfull,formatselect,"
        + "bullist,numlist,outdent,indent",
        theme_advanced_buttons2 : "link,unlink,anchor,image,separator,"
        +"undo,redo,cleanup,code,separator,sub,sup,charmap",
        theme_advanced_buttons3 : "",
        height:"350px",
        width:"100%"
    });
    </script>
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