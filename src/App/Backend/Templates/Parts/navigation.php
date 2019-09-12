<nav class="navbar navbar-expand-md static-top navbar-light">
    <a class="navbar-brand" href="home">
        <img src="/images/Logo.png" id="logo" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="nav navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="home">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gestion-chapitres">Chapitres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="gestion-commentaires">Commentaires</a>
            </li>
        </ul>
        <?php
        if (isset($_COOKIE['connected'])){
          ?>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-item">
            <a class="nav-link" href="deconnecter">Se déconnecter</a>
          </li>
        </ul>
        <?php
        }
        ?>
    </div>
</nav>
