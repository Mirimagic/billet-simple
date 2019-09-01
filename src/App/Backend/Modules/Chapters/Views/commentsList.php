<section>
    <div class="container groupAdmin">
        <div class="row">
            <div class="col-12">
                <h2 class="titleGroup">Gestion des commentaires signalés</h2>
            </div>
        </div>
        <div class="row">
        <div class="col-12">
                <?php
                if($numberReportedComments === "0")
                {
                ?>
                <p class="message">Bravo ! Il n'y a aucun commentaire à modérer !</p>
                <div id="gifFinished">
                    <img src="\images\finished.gif" alt="Travail terminé">
                </div>
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

        <?php
        foreach($listeComments as $comment)
        {
        ?>
        <div class="row separation">
            <div class="col-9">
                <h4>Chapitre <?=$comment['chapters']?> – Commentaire de <?=$comment['author']?></h4>
                <p><?=$comment['content']?></p>
                <p class="date">Posté le <?=$comment['date']->format('d/m/Y à H:i')?></p>
            </div>
            <div class="col-3">
                <a href="">Retirer le signalement</a><br>
                <a class="report" href="">Supprimer</a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>