<section>
<div class="container groupAdmin">
        <div class="row">
            <div class="col-12">
                <h2 class="titleGroup">Gestion des chapitres</h2>
            </div>
        </div>
        <div id="buttonCreatChapter">
            <a href="nouveau-chapitre.html" class="btn btn-primary" id="AddComment"role="button">Nouveau Chapitre</a>
        </div>
        <?php
        foreach($listeChapters as $chapters)
        {
        ?>
        <div class="row separation">
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
                <p>Posté le <?=$chapters['dateAdd']->format('d/m/Y à H:i')?> – X Commentaires </p>
            </div>
            <div class="col-3">
                <a href="modifier-chapitre-<?=$chapters['id']?>.html">Modifier</a><br>
                <a class="report" href="supprimer-chapitre-<?=$chapters['id']?>.html">Supprimer</a>
            </div>
        </div>
        <?php
        }?>
    </div>
</section>