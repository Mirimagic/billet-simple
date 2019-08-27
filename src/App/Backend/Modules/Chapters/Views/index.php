<?php $title = 'Administration' ?>

<section id="information">
    <div class="container groupAdmin">
        <div class="row">
            <div class="col-12">
                <h2 class="titleGroup">Gestionnaire</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
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
        <?php
        foreach($listeChapters as $chapters)
        {
        ?>
        <div class="row separation">
            <div class="col-9">
                <h4>Chapitre <?=$chapters['ChapterNumber']?> – <?=$chapters['title']?></h4>
                <p>Le <?=$chapters['dateAdd']->format('d/m/Y à H:i')?> – X Commentaires </p>
            </div>
            <div class="col-3">
                <a href="modifier-chapitre-<?=$chapters['id']?>.html">Modifier</a><br>
                <a class="report" href="supprimer-chapitre-<?=$chapters['id']?>.html">Supprimer</a>
            </div>
        </div>
        <?php
        }?>
        <div id="buttonCreatChapter">
            <a href="admin/nouveau-chapitre\.html" class="btn btn-primary" id="AddComment"role="button">Nouveau Chapitre</a>
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
                <a class="report" href="admin/supprimer-commentaire-<?=$comment['id']?>.html">Supprimer</a>
            </div>
        </div>
    </div>
</section>