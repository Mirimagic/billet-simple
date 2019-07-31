<?php $title = 'À propos' ?>

<?php ob_start(); ?>

<section id='About'>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>À propos</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mx-auto">
                <img src="public/images/JForteroche.png" alt="Jean Forteroche" class="profilPicture">
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>