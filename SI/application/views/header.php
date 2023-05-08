<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-5 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">COMPTABILITE</span>
            </a>
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="<?php echo base_url('Welcome'); ?>" class="nav-link text-black">HOME</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Society_controller'); ?>" class="nav-link text-black">SOCIETE</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Plan_comptable'); ?>" class="nav-link text-black">PLAN COMPTABLE</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Compte_tiers'); ?>" class="nav-link text-black">COMPTE TIERS</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Balance'); ?>" class="nav-link text-black">ECRITURE</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Balance1?devise=1'); ?>" class="nav-link text-black">BALANCE</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Grandlivre?devise=1'); ?>" class="nav-link text-black">GRAND LIVRE</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Etatfinancier_actif'); ?>" class="nav-link text-black">E F ACTIFS</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Etatfinancierpassif'); ?>" class="nav-link text-black">E F PASSIFS</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Etatfinanciergeneral'); ?>" class="nav-link text-black">E F GENERAL</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Login/logout'); ?>" class="nav-link text-black"><i class="fa fa-power-off" aria-hidden="true" style="color: #DC3545;border:solid 2px;padding:4px;border-radius:4px"></i></a></li>
            </ul>
        </header>
    </div>