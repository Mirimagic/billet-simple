<?php $title = 'Chapitre' ?>

<section id="Chapter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Chapitre <?=$chapters['chapterNumber']?> – <?=$chapters['title']?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="date">Sorti le <?=$chapters['dateAdd']->format('d/m/Y à H:i')?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="chapters-picture">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p><?=nl2br($chapters['content'])?></p>
            </div>
        </div>
    </div>
</section>

<section id="Comment">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Commentaires</h2>
            </div>
        </div>
        <!-- foreach -->
        <?php
        if (empty($comments))
        {
        ?>
        <p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
        <?php
        }

        foreach($comments as $comment)
        {
        ?>
        <div class="row comment">
            <div class="col-12">
                <div class="row">
                    <div class="col-10">
                        <p><span class="bold"><?=htmlspecialchars($comment['author'])?></span> – Posté le <?=$comment['date']->format('d/m/Y à H:i')?></p>
                    </div>
                    <div class="col-2 reportBloc">
                        <a href="" class="report">Signaler</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p><?= nl2br(htmlspecialchars($comment['content']))?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>

        <a href="commenter-<?=$chapters['id']?>.html" class="btn btn-primary" role="button">Ajouter un commentaire</a>

    </div>
</section>