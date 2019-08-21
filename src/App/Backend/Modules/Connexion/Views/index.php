<?php $title = 'Administration' ?>

<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="row">
                    <div class="col-12">
                        <h2 id="titleAdmin">Bienvenu sur l'espace d'administration</h2>
                    </div>
                </div>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="login">Email</label>
                        <input type="text" id="login" class="form-control" placeholder="Login" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" class="form-control" placeholder="Mot de passe" required>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="stayConnected">
                            <label for="stayConnected" class="form-check-label">Rester connecté</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </form>
            </div>
        </div>
    </div>
</section>