<?php $title = 'À propos' ?>

<?php ob_start(); ?>

<section id='About'>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>À propos</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-4 mx-auto">
                <img src="public/images/JForteroche.png" alt="Jean Forteroche" class="profilPicture">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum rutrum vestibulum massa sed viverra. Duis fringilla, ex ac sollicitudin tincidunt, turpis mi dapibus urna, ac mattis velit mauris pharetra ex. Donec vehicula feugiat est, id gravida nulla lobortis blandit. Proin commodo, tellus nec rutrum fermentum, leo enim lobortis diam, et interdum orci lorem in purus. Cras lacinia velit nec enim efficitur ullamcorper. Cras orci nisi, luctus nec neque ut, dignissim luctus mi. Donec efficitur vitae ligula at vestibulum. Integer mattis quis ex vel faucibus. Nam feugiat massa sit amet sapien maximus, eu molestie magna scelerisque. Aliquam elit augue, eleifend non venenatis ut, placerat eget nisi. Suspendisse id eleifend augue, vel consequat sem. Duis vitae arcu justo.</p>
                <p>Etiam id diam sit amet dolor dapibus auctor. Nulla facilisi. Aliquam tincidunt condimentum ipsum, sed gravida turpis volutpat ac. Integer facilisis, magna sed lacinia rutrum, sem libero gravida felis, ac ullamcorper arcu velit quis nibh. Quisque dapibus mattis imperdiet. In sollicitudin iaculis felis. Curabitur ut purus nec libero suscipit maximus. Aliquam eu nulla imperdiet, egestas risus cursus, congue lacus. Curabitur felis tortor, vulputate eget sodales eget, dapibus rutrum lorem. Proin a enim ultricies, varius ante a, imperdiet turpis. Integer euismod pharetra tempor. Duis placerat vestibulum tellus, et mattis eros. Aliquam erat volutpat. Curabitur quis nibh placerat, venenatis felis sit amet, placerat neque. Nulla nunc elit, egestas at risus at, tempor cursus magna. In hac habitasse platea dictumst.</p>
                <p>Sed id tortor eu leo mattis blandit. In dignissim elit non dolor congue, vitae aliquet justo fermentum. Donec placerat aliquam facilisis. In non blandit elit. Cras faucibus aliquet pulvinar. Quisque non nisl cursus, viverra dolor non, condimentum quam. Nunc metus ex, tempor in magna sed, rutrum euismod odio.</p>
                <p>Proin id diam tortor. Duis convallis mi et quam vestibulum, in consequat lorem scelerisque. Mauris sit amet risus elit. Aliquam vestibulum ligula a eros accumsan blandit. Suspendisse varius mi id felis placerat, eu molestie nunc iaculis. Integer varius volutpat mauris vel volutpat. Fusce mattis tellus vel ornare porta. Duis ultrices nulla erat. Vestibulum ultricies molestie est eu molestie. Nulla ultricies massa id sem tempus ultricies sit amet sed leo. Duis sed felis eleifend, dictum justo ut, iaculis nibh. Cras auctor sit amet nisl vel condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean efficitur vel erat at faucibus.</p>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require('template/template.php'); ?>