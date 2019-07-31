<?php $title = 'Administration' ?>

<?php ob_start(); ?>

<section id="logIn">
    <div class="container">
        <div class="row">
            <div class="col-6 offset-3">
                <div class="row">
                    <div class="col-12">
                        <h2 id="titleAdmin">Bienvenu sur l'espace d'administration</h2>
                    </div>
                </div>
                <form action="">
                    <div class="form-group">
                        <label for="logInEmail">Email</label>
                        <input type="email" id="logInEmail" class="form-control" placeholder="Email" required>
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
                <div class="row">
                    <div class="col-12">
                        <a href="" id="passwordForget">Mot de passe oublié</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- mot de passe oublié-->

<?php $content = ob_get_clean(); ?>

<?php require('templateAdmin/templateAdmin.php'); ?>