<?php

function home()
{
    require('view/frontend/homeView.php');
}

function chapter()
{
    require('view/frontend/chapterView.php');
}

function about()
{
    require('view/frontend/aboutView.php');
}

function contact()
{
    require('view/frontend/contactView.php');
}

function login()
{
    require('view/frontend/admin/logInView.php');
}

function homeAdmin()
{
    require('view/frontend/admin/homeAdminView.php');
}

function chaptersPanelAdmin()
{
    require('view/frontend/admin/chaptersPanelAdminView.php');
}

function comentsPanelAdmin()
{
    require('view/frontend/admin/comentsPanelAdminView.php');
}
