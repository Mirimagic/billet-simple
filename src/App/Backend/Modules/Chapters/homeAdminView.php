<?php $title = 'Administration' ?>

<?php ob_start(); ?>

<section id="information">
    <div class="container groupAdmin">
        <div class="row">
            <div class="col-12">
                <h2 class="titleGroup">Gestionnaire</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <p class="message">Vous avez <span class="bold">X</span> nouveau messages non-lus.</p>
            </div>
            <div class="col-6">
                <p class="message"> Vous avez <span class="bold">X</span> commentaires signalé à modérer.</p>

            </div>
        </div>
    </div>
</section>

<section id="5Chapters">
    <div class="container groupAdmin">
        <div class="row">
            <div class="col-12">
                <h2 class="titleGroup">Les 5 derniers chapitres</h2>
            </div>
        </div>
        <div class="row separation">
            <div class="col-9">
                <h4>Chapitre X – Titre</h4>
                <p>Le XX/XX/XXXX – X Commentaires </p>
            </div>
            <div class="col-3">
                <a href="">Modifier</a><br>
                <a class="report" href="">Supprimer</a>
            </div>
        </div>
    </div>
</section>

<section id="5Comments">
    <div class="container groupAdmin">
        <div class="row">
            <div class="col-12">
                <h2 class="titleGroup">Les 5 derniers commentaires</h2>
            </div>
        </div>
        <div class="row separation">
            <div class="col-9">
                <h4>Auteur</h4>
                <p>Le commentaire</p>
                <p class="date">Le XX/XX/XXXX à XXhXX</p>
            </div>
            <div class="col-3">
                <a href="">Retirer le signalement</a><br>
                <a class="report" href="">Supprimer</a>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin/templateAdmin.php'); ?>