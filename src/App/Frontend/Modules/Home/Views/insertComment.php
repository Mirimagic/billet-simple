<div class="container">
    <div class="row">
        <div class="col-12">
            <h2>Ajouter un commentaire</h2>
        </div>
    </div>

        <form action="" method="post">
            <div class="form-group">
                <label for="name">Pseudo</label>
                <input type="text" class="form-control" id="name" placeholder="Pseudo" required>
            </div>
            <div class="form-group">
                <label for="commentArea">Commentaire</label>
                <textarea class="form-control" id="commentArea" rows="3" required><?= isset($comment) ? htmlspecialchars($comment['contenu']) : '' ?></textarea>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="commentCheck" required>
                    <label class="form-check-label" for="commentCheck">En cochant cette case, je certifie que mon commentaire est respectueux</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Poster le commentaire</button>
        </form>
    </div>
</div>
