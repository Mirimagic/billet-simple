<?php $title = 'Accueil' ?>

<section id="lastChapter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Dernier chapitre</h2>
            </div>
        </div>
        <div id="displayLastChapter">
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
                <div class="offset-1">
                    <button type="button" class="btn btn-primary">Lire le chapitre</button>
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

<section id="oldChapters">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Anciens chapitres</h2>
            </div>
        </div>

        <?php
        foreach ($listeChapters as $chapter) { ?>
        <div class="row oldChapter">
            <div class="col-3">
                <img src="/images/bears-1149459_1920.jpg" alt="" class="oldChapterPicture">
            </div>
            <div class="col-9">
                <h4>Chapitre <?=$chapter['chapterNumber']?> – <?=$chapter['title']?></h4>
                <p><?=nl2br($chapter['content'])?></p>
                <a href="chapter-<?=$chapter['id']?>.html">Lire la suite</a>
                <p class="date">Sorti le <?=$chapter['dateAddFr']?>  – X Commentaire(s)</p>
            </div>
        </div>
            <?php
        } ?>
        <div class="moreChapters">
            <button type="button" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Charger plus de chapitres</button>
        </div>
    </div>
</section>