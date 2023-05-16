<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/parsley.js"></script>

<section>
  <div style="padding-top: 60px;padding-bottom: 30px;">
    <div class="container" style="padding-bottom: 10px;">
      <div class="row" style="margin-top: 44px;">
        <div class="col-md-6 col-lg-5">
          <h2 class="h4" style="margin-top: 35px;color: #00b5a8;border-color: #23295f;">DIMPEX</h2>
          <h2 class="h4" style="margin-top: 35px;color: #00b5a8;border-color: #23295f;">CALCUL DU COUP DE REVIENT PRODUCTION MAIS</h2>
          <div style="padding-top: 0px;"><span><strong>Le :</strong></span><span style="margin-left: 5px;"></span></div>
          <div style="padding-top: 0px;"><span><strong>Cours $ :</strong></span><span style="margin-left: 5px;">5000</span></div>
          <div style="padding-top: 0px;"><span><strong>Cours Eur :</strong></span><span style="margin-left: 5px;">4500</span></div>
        </div>
        <div class="col-md-12 col-lg-7"></div>
      </div>
    </div>
  </div>
</section>
<div class="container">
  <table class="table">
    <thead>
      <tr>
        <th>Rubriques</th>
        <th>Total</th>
        <th>Unite d'oeuvre</th>
        <th>Coup par unite</th>
        <th>Quantite</th>
        <th>Nature</th>
        <th></th>
        <th>Adm/Dist</th>
        <th></th>
        <th></th>
        <th>Usine</th>
        <th></th>
        <th></th>
        <th>Plantation</th>
        <th></th>
        <th></th>
        <th>Total</th>
        <th></th>
      </tr>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>%</th>
        <th>Fixe</th>
        <th>Variable</th>
        <th>%</th>
        <th>Fixe</th>
        <th>Variable</th>
        <th>%</th>
        <th>Fixe</th>
        <th>Variable</th>
        <th>Fixe</th>
        <th></th>
        <th>Variable</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sommef1 = 0;
      $sommev1 = 0;
      $sommef2 = 0;
      $sommev2 = 0;
      $sommef3 = 0;
      $sommev3 = 0; 
      for ($i = 0; $i < count($list); $i++) { ?>
        <tr>
          <!-- NOM DU COMPTE -->
          <td><?php echo $list[$i]['nom_compte']; ?></td>
          <!-- PRIXUNITE*QUANTITE -->
          <td><?php echo $list[$i]['somme'] ?></td>
          <!-- UNITE D'OEUVRE -->
          <td></td>
          <!-- PRIXUNITE -->
          <td><?php echo $list[$i]['prixunite']; ?></td>
          <!-- QUANTITE -->
          <td><?php echo $list[$i]['quantite']; ?></td>
          <!-- NATURE -->
          <td></td>
          <!-- % ADM/DIST -->
          <td><?php if ($list[$i]['idcentre'] == 1) {
                echo $list[$i]['pourcentage'];
              } else {
                echo "";
              } ?></td>
          <!-- FIXE ADM/DIST -->
          <td><?php if ($list[$i]['idcentre'] == 1 && $list[$i]['idnature'] == 1) {
                $sommef1 = (($list[$i]['somme'] * $list[$i]['pourcentage']) / 100) + $sommef1;
                echo ($list[$i]['somme'] * $list[$i]['pourcentage']) / 100;
              } else {
                echo "";
              } ?></td>
          <!-- VARIABLE ADM/DIST -->
          <td><?php if ($list[$i]['idcentre'] == 1 && $list[$i]['idnature'] == 2) {
            $sommev1 = (($list[$i]['somme'] * $list[$i]['pourcentage']) / 100) + $sommev1;
                echo ($list[$i]['somme'] * $list[$i]['pourcentage']) / 100;
              } else {
                echo "";
              } ?></td>
          <!-- % USINE -->
          <td><?php if ($list[$i]['idcentre'] == 2) {
                echo $list[$i]['pourcentage'];
              } else {
                echo "";
              } ?></td>
          <!-- FIXE USINE -->
          <td><?php if ($list[$i]['idcentre'] == 2 && $list[$i]['idnature'] == 1) {
                $sommef2 = (($list[$i]['somme'] * $list[$i]['pourcentage']) / 100) + $sommef2;
                echo ($list[$i]['somme'] * $list[$i]['pourcentage']) / 100;
              } else {
                echo "";
              } ?></td>
          <!-- VARIABLE USINE -->
          <td><?php if ($list[$i]['idcentre'] == 2 && $list[$i]['idnature'] == 2) {
                $sommev2 = (($list[$i]['somme'] * $list[$i]['pourcentage']) / 100) + $sommev2;
                echo ($list[$i]['somme'] * $list[$i]['pourcentage']) / 100;
              } else {
                echo "";
              } ?></td>
          <!-- % PLANTATION -->
          <td><?php if ($list[$i]['idcentre'] == 3) {
                echo $list[$i]['pourcentage'];
              } else {
                echo "";
              } ?></td>
          <!-- FIXE PLANTATION -->
          <td><?php if ($list[$i]['idcentre'] == 3 && $list[$i]['idnature'] == 1) {
            $sommef3 = (($list[$i]['somme'] * $list[$i]['pourcentage']) / 100) + $sommef3;
                echo ($list[$i]['somme'] * $list[$i]['pourcentage']) / 100;
              } else {
                echo "";
              } ?></td>
          <!-- VARIABLE PLANTATION -->
          <td><?php if ($list[$i]['idcentre'] == 3 && $list[$i]['idnature'] == 2) {
            $sommev3 = (($list[$i]['somme'] * $list[$i]['pourcentage']) / 100) + $sommev3;
                echo ($list[$i]['somme'] * $list[$i]['pourcentage']) / 100;
              } else {
                echo "";
              } ?></td>
          <!-- TOTAL -->
          <td><?php if ($list[$i]['idnature'] == 1) {
                echo $list[$i]['somme'];
              } else {
                echo "";
              } ?></td>
          <td></td>
          <td><?php if ($list[$i]['idnature'] == 2) {
                echo $list[$i]['somme'];
              } else {
                echo "";
              } ?></td>
        </tr>
      <?php } ?>
      <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo $sommef1; ?></td>
        <td><?php echo $sommev1; ?></td>
        <td></td>
        <td><?php echo $sommef2; ?></td>
        <td><?php echo $sommev2; ?></td>
        <td></td>
        <td><?php echo $sommef3; ?></td>
        <td><?php echo $sommev3; ?></td>
        <td><?php echo $sumfixe; ?></td>
        <td></td>
        <td><?php echo $sumvariable; ?></td>
      </tr>
      <tr>
        <td>TOTAL</td>
        <td><?php echo $sumall; ?></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td><?php echo $sommef1 + $sommev1; ?></td>
        <td></td>
        <td></td>
        <td><?php echo $sommef2 + $sommev2; ?></td>
        <td></td>
        <td></td>
        <td><?php echo $sommef3 + $sommev3; ?></td>
        <td></td>
        <td><?php echo $sumfixe; ?></td>
        <td></td>
        <td><?php echo $sumvariable; ?></td>
      </tr>
    </tbody>
  </table>
  <table class="table" style="margin-top: 100px;">
    <thead>
      <tr>
        <th>REPARTITION ADM/DISTR</th>
        <th>Cout direct</th>
        <th>Cle</th>
        <th>ADM/DIST</th>
        <th>Cout total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>TOTAL PLANTATION</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>TOTAL USINE</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>TOTAL GENERAL</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <table class="table" style="margin-top: 100px;">
    <thead>
      <tr>
        <th>COUT DU KG MAIS GRAIN</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Unite d'oeuvre</td>
        <td></td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td></td>
      </tr>
      <tr>
        <td>Cout plantation</td>
        <td></td>
      </tr>
      <tr>
        <td>COUT DU KG grain MAIS</td>
        <td></td>
      </tr>
    </tbody>
  </table>
  <table class="table" style="margin-top: 100px;">
    <thead>
      <tr>
        <th>COUT KG MAIS concaisse</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Unite d'oeuvre</td>
        <td></td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td></td>
      </tr>
      <tr>
        <td>Cout plantation</td>
        <td></td>
      </tr>
      <tr>
        <td>Cout usinage</td>
        <td></td>
      </tr>
      <tr>
        <td>COUTS TOTAUX</td>
        <td></td>
      </tr>
      <tr>
        <td>COUT DU KG de MAIS concaisse</td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>