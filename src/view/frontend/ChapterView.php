<?php $title = 'Chapitre' ?>

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
            <div class="col-12">
                <div class="chapter-picture">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Thalassius vero ea tempestate praefectus praetorio praesens ipse quoque adrogantis ingenii, considerans incitationem eius ad multorum augeri discrimina, non maturitate vel consiliis mitigabat, ut aliquotiens celsae potestates iras principum molliverunt, sed adversando iurgandoque cum parum congrueret, eum ad rabiem potius evibraba</p>
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
        <div class="row comment">
            <div class="col-12">
                <div class="row">
                    <div class="col-10">
                        <p><span class="bold">NOM</span> – Posté le XX/XX/XXXX à XXhXX</p>
                    </div>
                    <div class="col-2 report-bloc">
                        <a href="" class="report">Signaler</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p> Ceci est un commentaire</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row comment">
            <div class="col-12">
                <div class="row">
                    <div class="col-10">
                        <p><span class="bold">NOM</span> – Posté le XX/XX/XXXX à XXhXX</p>
                    </div>
                    <div class="col-2 report-bloc">
                        <a href="" class="report">Signaler</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <p> Ceci est un commentaire</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>