<?php $title = 'Contact' ?>

<?php ob_start(); ?>

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Contact</h2>
            </div>
        </div>
        <form action="">
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="lastName">Nom*</label>
                    <input type="text" class="form-control" id="lastName" placeholder="Nom" required>
                </div>
                <div class="form-group col-6">
                    <label for="firstName">Prénom*</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Prénom" required>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="PhoneNumber">Numéro de téléphone</label>
                <input type="text" class="form-control" id="PhoneNumber" placeholder="Numéro de téléphone (ex: 06xxxxxx)">
            </div>
            <div class="form-group">
                <label for="message">Message*</label>
                <textarea class="form-control" id="message" rows="10" placeholder="Votre message" required></textarea>
                <small id="helopMessage" class="form-text text-muted">*Obligatoire</small>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>