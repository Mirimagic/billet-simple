<?php
    use OCFram\PDOFactory;
    use OCFram\Paginator;
    $mysqli = PDOFactory::getMysqlConnexion();
    $query = 'SELECT id, chapterNumber, title, content, dateAdd, dateUpdate FROM chapters ORDER BY id DESC';

    $limit = (isset($_GET['limit'])) ? $_GET['limit'] : 5;
    $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
    $links = 5;

    $paginator = new Paginator($mysqli, $query);
    $results = $paginator->getData($limit, $page);
?>

<section>
    <div class="container">
        <div class="row">
            <h2>Tous les chapitres</h2>
        </div>
        <?= $paginator->createLinks($links);?>
        <?php
        for($p = 0; $p < count($results->data); $p++)
        {
            $chapters = $results->data[$p];
            ?>
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
                    <p>Sorti le <?=$chapters['dateAdd']/* ->format('d/m/Y à H:i') */?>
                    <?php
                    if($chapters['dateAdd'] != $chapters['dateUpdate'])
                    {
                    ?>
                    – Modifié le <?=$chapters['dateUpdate']/* ->format('d/m/Y à H:i') */?>
                    <?php
                    }
                    ?></p>
                </div>
            </div>
                <?php
            } ?>      
    </div>
</section>