<div class="col-12">
    <form action="" method="post">
        <div class="form-group">
            <label for="setupChapterNumber">Numéro du chapitre</label>
            <input type="text" class="form-control" id="setupChapterNumber" placeholder="Numéro du chapitre (ex. 1, 1.5, 10)" name="chapterNumber">
        </div>
        <div class="form-group">
            <label for="setupChapterTitle">Titre du chapitre</label>
            <input type="text" class="form-control" id="setupChapterTitle" placeholder="Titre du chapitre" name="title" required>
        </div>
        <div class="form-group">
            <textarea name="elm1" id="elm1" cols="80" rows="15"></textarea>
        </div>
        <?php
        if(isset($chapters) && !$chapters->isNew())
        {
        ?>
            <input type="hidden" name="id" value="<?= $chapters['id'] ?>" />
            <input type="submit" value="Modifier" name="modifier" />
        <?php
        }
        else
        {
        ?>
            <input type="submit" value="Ajouter" />
        <?php
        }
        ?>
    </form>
</div>