<section>
    <div class="container">
        <div class="row">
            <h2>Tous les chapitres</h2>
        </div>
        <?php
        foreach ($listeChapters as $chapters) { ?>
        <div class="row oldChapter">
            <div class="col-3">
                <img src="/images/bears-1149459_1920.jpg" alt="" class="oldChapterPicture">
            </div>
            <div class="col-9">
                <?php
                if($chapters['chapterNumber'] === '')
                {
                ?>
                    <h4><?=$chapters['title']?></h4>
                <?php
                }
                else
                {
                ?>
                    <h4>Chapitre <?=$chapters['chapterNumber']?> – <?=$chapters['title']?></h4>
                <?php
                };
                ?>
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
                ?></p>
            </div>
        </div>
            <?php
        } ?>

    </div>
</section>