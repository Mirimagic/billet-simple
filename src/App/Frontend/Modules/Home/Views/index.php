<?php $title = 'Accueil' ?>

<section id="lastChapter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Dernier chapitre</h2>
            </div>
        </div>
        <div id="displayLastChapter">
            <?php if(!empty($lastChapter['chapterNumber']))
            {
            ?>
            <div class="row">
                <div class="offset-1">
                    <p id="last-chapters-numbre">Chapitre <?=$lastChapter['chapterNumber']?></p>
                </div>
            </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="offset-1">
                    <h3><?=$lastChapter['title']?></h3>
                </div>
            </div>
            <div class="row">
                <div class="offset-1">
                    <a href="chapitre-<?=$lastChapter['id']?>.html" class="btn btn-primary">Lire le chapitre</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 date">
                <p>Sorti le <?=$lastChapter['dateAdd']->format('d/m/Y à H:i')?>
                <?php
                if($lastChapter['dateAdd'] != $lastChapter['dateUpdate'])
                {
                ?>
                 – Modifié le <?=$lastChapter['dateUpdate']->format('d/m/Y à H:i')?>
                <?php
                }
                ?>
                 – X Commentaire(s)</p>
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
        foreach ($listeChapters as $chapters) { ?>
        <div class="row oldChapter">
            <div class="col-3">
                <img src="/images/bears-1149459_1920.jpg" alt="" class="oldChapterPicture">
            </div>
            <div class="col-9">
                <h4>Chapitre <?=$chapters['chapterNumber']?> – <?=$chapters['title']?></h4>
                <p><?=strip_tags($chapters['content'], '<br><strong><em>')?></p>
                <a href="chapitre-<?=$chapters['id']?>.html">Lire la suite</a>
                <p>Sorti le <?=$chapters['dateAdd']->format('d/m/Y à H:i')?>
                <?php
                if($chapters['dateAdd'] != $chapters['dateUpdate'])
                {
                ?>
                 – Modifié le <?=$chapters['dateUpdate']->format('d/m/Y à H:i')?>
                <?php
                }
                ?>
                 – X Commentaire(s)</p>
            </div>
        </div>
            <?php
        } ?>
        <div class="moreChapters">
            <button type="button" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Charger plus de chapitres</button>
        </div>
    </div>
</section>