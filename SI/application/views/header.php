<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
</head>

<body>
    <!-- ======= Header ======= -->
    <div class="container">
        <header class="d-flex flex-wrap justify-content-center py-3 mb-5 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <span class="fs-4">COMPTABILITE</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="<?php echo base_url('Welcome'); ?>" class="nav-link">HOME</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Balance'); ?>" class="nav-link">ECRITURE</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Balance1'); ?>" class="nav-link">BALANCE</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Grandlivre'); ?>" class="nav-link">GRAND LIVRE</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Society_controller'); ?>" class="nav-link">SOCIETE</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Plan_comptable'); ?>" class="nav-link">PLAN COMPTABLE</a></li>
                <li class="nav-item"><a href="<?php echo base_url('Compte_tiers'); ?>" class="nav-link">COMPTE TIERS</a></li>
            </ul>
        </header>
    </div>