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
        <div class="row separation">
            <div class="col-9">
                <h4>Chapitre X – Commentaire de X</h4>
                <p>Contenu du commentaire</p>
                <p class="date">Posté le XX/XX/XXXX</p>
            </div>
            <div class="col-3">
                <a href="">Retirer le signalement</a><br>
                <a class="report" href="">Supprimer</a>
            </div>
        </div>
    </div>
</section>