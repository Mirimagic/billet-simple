<?php
require "././vendor/leafo/scssphp/scss.inc.php";
$scss = new scssc();
$scss->setImportPaths("");

// will search for `assets/stylesheets/mixins.scss'
echo $scss->compile('@import "style.scss"');
