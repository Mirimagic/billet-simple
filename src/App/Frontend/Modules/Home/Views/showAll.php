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
                  <?php
                  if ($chapters['image'] != "")
                  {
                    ?>
                    <img src="/images/uploads/<?=$chapters['image']?>" alt="" class="oldChapterPicture">
                    <?php
                  }
                  else
                  {
                    ?>
                    <img src="/images/bears-1149459_1920.jpg" alt="" class="oldChapterPicture">
                    <?php
                  }
                  ?>
                </div>
                <div class="col-9">
                    <h4><?=$chapters['chapterNumber'] != '' ? 'Chapitre ' . $chapters['chapterNumber'] . ' – ' : ''?><?=$chapters['title']?></h4>
                  <?php
                  if (strlen($chapters['content']) > 200)
                  {
                    $start = substr($chapters['content'], 0, 200);
                    $start = substr($start, 0, strrpos($start, ' ')) . '...'; ?>

                    <p><?=strip_tags($start, '<br>')?></p>
                  <?php
                  } else
                  { ?>
                    <p><?=strip_tags($chapters['content'], '<br>')?></p>
                  <?php
                  }
                  ?>
                    <a href="chapitre-<?=$chapters['id']?>.html">Lire la suite</a>
                    <p>Sorti le <?=$chapters['dateAddFr']?>
                    <?php
                    if($chapters['dateAddFr'] != $chapters['dateUpdateFr'])
                    {
                    ?>
                    – Modifié le <?=$chapters['dateUpdateFr']?>
                    <?php
                    }
                    ?></p>
                </div>
            </div>
                <?php
            } ?>
        <?= $paginator->createLinks($links);?>
    </div>
</section>
