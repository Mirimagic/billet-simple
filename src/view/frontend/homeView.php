<?php $title = 'Accueil' ?>

<?php ob_start(); ?>

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
        <!-- foreach -->
        <div class="row oldChapter">
            <div class="col-3">
                <img src="public/images/bears-1149459_1920.jpg" alt="" class="oldChapterPicture">
            </div>
            <div class="col-9">
                <h4>Chapitre X – Ceci est un titre</h4>
                <p>Thalassius vero ea tempestate praefectus praetorio praesens ipse quoque adrogantis ingenii, considerans incitationem eius ad multorum augeri discrimina, non maturitate vel consiliis mitigabat, ut aliquotiens celsae potestates iras principum molliverunt, sed adversando iurgandoque cum parum congrueret, eum ad rabiem potius evibrabat...</p>
                <a href="index.php?action=chapter">Lire la suite</a>
                <p class="date">Sorti le DATE – X Commentaire(s)</p>
            </div>
        </div>
        <div class="row oldChapter">
            <div class="col-3">
                <img src="public/images/bears-1149459_1920.jpg" alt="" class="oldChapterPicture">
            </div>
            <div class="col-9">
                <h4>Chapitre X – Ceci est un titre</h4>
                <p>Thalassius vero ea tempestate praefectus praetorio praesens ipse quoque adrogantis ingenii, considerans incitationem eius ad multorum augeri discrimina, non maturitate vel consiliis mitigabat, ut aliquotiens celsae potestates iras principum molliverunt, sed adversando iurgandoque cum parum congrueret, eum ad rabiem potius evibrabat...</p>
                <a href="index.php?action=chapter">Lire la suite</a>
                <p class="date">Sorti le DATE – X Commentaire(s)</p>
            </div>
        </div>
        <div class="moreChapters">
            <button type="button" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Charger plus de chapitres</button>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>