<?php $title = 'Accueil' ?>

<?php ob_start(); ?>

<section id="last-chapter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Dernier chapitre</h2>
            </div>
        </div>
        <div id="display-last-chapter">
            <div class="row">
                <div class="offset-1">
                    <p id="last-chapter-numbre">Chapitre X</p>
                </div>
            </div>
            <div class="row">
                <div class="offset-1">
                    <h3>Titre du chapitre</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-5 offset-1">
                    <button>Lire le chapitre</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 date">
                <p>Sorti le DATE – X Commentaire(s)</p>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>