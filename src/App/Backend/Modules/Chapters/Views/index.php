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
                <?php
                if($numberReportedComments === "0")
                {
                ?>
                <p class="message">Bravo ! Il n'y a aucun commentaire à modérer !</p>
                <?php
                }
                elseif($numberReportedComments === "1")
                {
                ?>
                <p class="message"> Vous avez <span class="bold"><?=$numberReportedComments?></span> commentaire signalé à modérer.</p>
                <?php
                }
                else
                {
                ?>
                <p class="message"> Vous avez <span class="bold"><?=$numberReportedComments?></span> commentaires signalés à modérer.</p>
                <?php   
                }
                ?>
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
                <p class="date">Posté le <?=$chapters['dateAdd']->format('d/m/Y à H:i')?> – X Commentaires </p>
            </div>
            <div class="col-3">
                <a href="modifier-chapitre-<?=$chapters['id']?>.html">Modifier</a><br>
                <a class="report" href="supprimer-chapitre-<?=$chapters['id']?>.html">Supprimer</a>
            </div>
        </div>
        <?php
        }?>
        <div id="buttonCreatChapter">
            <a href="nouveau-chapitre.html" class="btn btn-primary" id="AddComment"role="button">Nouveau Chapitre</a>
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
        <?php
        foreach($listeComments as $comment)
        {
        ?>
        <div class="row separation <?=($comment['reported'] == '1' ? 'reported' : '');?>">
            <div class="col-9">
                <h4><?=$comment['author']?></h4>
                <p><?=nl2br(htmlspecialchars($comment['content']))?></p>
                <p class="date">Posté le <?=$comment['date']->format('d/m/Y à H:i')?></p>
            </div>
            <div class="col-3">
                <a href="http://localhost/chapitre-<?=$comment['chapters']?>.html">Voir le commentaire</a><br>
                <?php
                if($comment['reported'] == '1')
                {?>
                <a href="">Retirer le signalement</a><br>
                <?php
                }?>
                <a class="report" href="supprimer-commentaire-<?=$comment['id']?>.html">Supprimer</a>
            </div>
        </div>
        <?php
        }
        ?>    
    </div>
</section>