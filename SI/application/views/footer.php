<link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-5/css/all.min.css'); ?>">

<div class="container">
    <footer class="py-5 mt-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <h5>Section</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-1"><a href="<?php echo base_url('Welcome'); ?>" class="nav-link p-0 text-muted text-lowercase fs-6">HOME</a></li>
                <li class="nav-item mb-1"><a href="<?php echo base_url('Society_controller'); ?>" class="nav-link  p-0 text-muted text-lowercase  fs-6">SOCIETE</a></li>
                <li class="nav-item mb-1"><a href="<?php echo base_url('Plan_comptable'); ?>" class="nav-link  p-0 text-muted text-lowercase  fs-6">PLAN COMPTABLE</a></li>
                <li class="nav-item mb-1"><a href="<?php echo base_url('Compte_tiers'); ?>" class="nav-link  p-0 text-muted text-lowercase  fs-6">COMPTE TIERS</a></li>
                <li class="nav-item mb-1"><a href="<?php echo base_url('Balance'); ?>" class="nav-link  p-0 text-muted text-lowercase  fs-6">ECRITURE</a></li>
                <li class="nav-item mb-1"><a href="<?php echo base_url('Balance1?devise=1'); ?>" class="nav-link  p-0 text-muted text-lowercase  fs-6">BALANCE</a></li>
                <li class="nav-item mb-1"><a href="<?php echo base_url('Grandlivre?devise=1'); ?>" class="nav-link  p-0 text-muted text-lowercase  fs-6">GRAND LIVRE</a></li>
                <li class="nav-item mb-1"><a href="<?php echo base_url('Etatfinancier_actif'); ?>" class="nav-link  p-0 text-muted text-lowercase  fs-6">ETAT FINANCIER ACTIFS</a></li>
                <li class="nav-item mb-1"><a href="<?php echo base_url('Etatfinancierpassifs'); ?>" class="nav-link  p-0 text-muted text-lowercase  fs-6">ETAT FINANCIER PASSIFS</a></li>
                <li class="nav-item mb-1"><a href="<?php echo base_url('Etatfinanciergeneral'); ?>" class="nav-link  p-0 text-muted text-lowercase  fs-6">ETAT FINANCIER GENERAL</a></li>
                </ul>
            </div>

            <div class="col-6 col-md-2 mb-3">
            </div>

            <div class="col-6 col-md-2 mb-3">
            </div>

            <div class="col-md-5 offset-md-1 mb-3">
                <form>
                    <h5>Subscribe to our newsletter</h5>
                    <p>Monthly digest of what's new and exciting from us.</p>
                    <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                        <label for="newsletter1" class="visually-hidden">Email address</label>
                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                        <button class="btn btn-success" type="button">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <p>&copy; 2023 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-twitter" width="16" height="16"></i></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-instagram" width="16" height="16"></i></a></li>
                <li class="ms-3"><a class="link-dark" href="#"><i class="fab fa-facebook" width="16" height="16"></i></a></li>
            </ul>
        </div>
    </footer>
</div>
