<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <title>Seuil de rentabilite</title>
</head>
<body>
    <?php
    $variable =0;
    $fixe = 0;
    $cout = $variable + $fixe;
    $quantite = $cout/2000;
    ?>

 <!-- table -->
 <div class="container mt-3">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>SEUIL DE RENTABILITE</h4>
            </div>
            <div class="card-body">
              <table class="table table-striped">
                <thead>
                  <tr>
                  <th scope="col">PRIX DE VENTE</th>
                  <th scope="col">COUT FIXE</th>
                  <th scope="col">COUT VARIABLE</th>
                <th scope="col">QUANTITE</th>
                  </tr>
                </thead>
                <tbody>
                    <tr class="ecriture">
                    <th scope="col">2000 ar</th>
                    <th scope="col"><?php echo $fixe?></th>
                    <th scope="col"><?php echo $variable ?></th>
                    <th scope="col"><?php echo $quantite ?></th>
                    </tr>
                </tbody>
              </table>
</body>
</html>