<?php $title = 'Administration' ?>

<?php ob_start(); ?>

<section>
    <div class="container groupAdmin">
        <div class="row">
            <div class="col-12">
                <h2>Gestion des commentaires</h2>
            </div>
        </div>
        <div class="row separation">
            <div class="col-9">
                <h4>Chapitre X – Titre</h4>
                <p>Le XX/XX/XXXX – X Commentaires </p>
            </div>
            <div class="col-3">
                <p><span class="bold">X</span> commentaires signalés</p>
                <a href="">Gérer les commentaires</a>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin/templateAdmin.php'); ?>