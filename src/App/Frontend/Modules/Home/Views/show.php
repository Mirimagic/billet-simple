<?php $title = 'Chapitre' ?>

<section id="Chapter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?=$chapters['chapterNumber'] != '' ? 'Chapitre ' . $chapters['chapterNumber'] . ' –' : ''?><?=$chapters['title']?></h2>
            </div>
        </div>
        <?php
        if ($chapters['image'] != "")
        {
        ?>
        <div class="row justify-content-center">
          <div class="col-6">
            <img src="/images/uploads/<?=$chapters['image']?>" alt="" class="chapterPicture">
          </div>
        </div>
          <?php
        }
          ?>
        <div class="row">
            <div class="col-12">
            <p>Sorti le <?=$chapters['dateAdd']->format('d/m/Y à H:i')?>
                <?php
                if($chapters['dateAdd'] != $chapters['dateUpdate'])
                {
                ?>
                 – Modifié le <?=$chapters['dateUpdate']->format('d/m/Y à H:i')?>
                <?php
                }
                ?>
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
                        <a href="signaler-commentaire-<?=$comment['id']?>.html" class="report">Signaler</a> <br />
                        <?php if ($user->isAuthenticated())
                        {?>
                        <a href="supprimer-commentaire-<?=$comment['id']?>.html" class="report">Supprimer</a>
                        <?php
                        }?>
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

        <a href="commenter-<?=$chapters['id']?>.html" class="btn btn-primary" id="AddComment"role="button">Ajouter un commentaire</a>

    </div>
</section>
