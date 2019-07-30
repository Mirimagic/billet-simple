<?php $title = 'Accueil' ?>

<?php ob_start(); ?>

<section id="Chapter">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Chapitre X – Titre du Chapitre</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p class="date">Sorti le DATE</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 .chapter-picture">
                <img src="" alt="">
            </div>
        </div>
        <div class="row">
            <p>Thalassius vero ea tempestate praefectus praetorio praesens ipse quoque adrogantis ingenii, considerans incitationem eius ad multorum augeri discrimina, non maturitate vel consiliis mitigabat, ut aliquotiens celsae potestates iras principum molliverunt, sed adversando iurgandoque cum parum congrueret, eum ad rabiem potius evibraba</p>
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
    </div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>