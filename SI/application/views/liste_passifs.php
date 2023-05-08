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
          <h2 class="h4" style="margin-top: 35px;color: #00b5a8;border-color: #23295f;">SOCIETE</h2>
          <div style="padding-top: 0px;"><span><strong>Adresse :</strong></span><span style="margin-left: 5px;"><?php echo $society[0]->address ;?></span></div>
          <div style="padding-top: 0px;"><span><strong>Capitale:</strong></span><span style="margin-left: 5px;"><?php echo $society[0]->residence ;?></span></div>
          <div style="padding-top: 0px;"><span><strong>NIF:</strong></span><span style="margin-left: 5px;"><?php echo $nif;?></span></div>
          <div style="padding-top: 0px;"><span><strong>STAT:</strong></span><span style="margin-left: 5px;"><?php echo $stat;?></span></div>
          <div></div>
          <div style="padding-top: 0px;"></div>
          <div style="padding-top: 0px;"></div>
          <h2 class="h4" style="margin-top: 15px;color: #00b5a8;">BILAN</h2>
          <div style="padding-top: 0px;"><span><strong>Exercice clos au :</strong></span><span style="margin-left: 5px;"><?php  echo $exercice;?></span></div>
          <div style="padding-top: 0px;"><span><strong>Unite monetaire :</strong></span><span style="margin-left: 5px;">Ariary</span></div>
          <div style="padding-top: 0px;"></div>
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
                <th>Actifs</th>
                <th>Comptes</th>
                <th>Montant</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>CAPITAUX PROPRES</strong></td>
            </tr>
            <tr>
                <td>Capital emis</td>
                <td>101</td>
                <td><?php echo $capit ;?></td>
            </tr>
            <tr>
                <td>Reserves legales</td>
                <td>105</td>
                <td><?php echo $reser ;?></td>
            </tr>
            <tr>
                <td>Resultat en instance d affectation</td>
                <td>128</td>
                <td><?php echo $result_inst ;?></td>
            </tr>
            <tr>
                <td>Resultat net</td>
                <td>120</td>
                <td><?php echo $result_net ;?></td>
            </tr>
            <tr>
                <td>Autres capitaux propres</td>
                <td>11</td>
                <td><?php echo $capi_prop ;?></td>
            </tr>
            <tr>
                <td>TOTAL CAPITAUX PROPRES</td>
            </tr>



            <tr>
                <td><strong>PASSIFS NON COURANTS</strong></td>
            </tr>
            <tr>
                <td>Impots differes</td>
                <td>13</td>
                <td><?php echo $result_net ;?></td>
            </tr>
            <tr>
                <td>Emprunts/dettes a LMT part+1an</td>
                <td>161</td>
                <td><?php echo $empr ;?></td>
            </tr>
            <tr>
                <td>TOTAL PASSIFS NON COURANT</td>
            </tr>



            <tr>
                <td><strong>PASSIFS COURANTS</strong></td>
            </tr>
            <tr>
                <td>Dettes court terme</td>
                <td>165</td>
                <td><?php echo $dette ;?></td>
            </tr>
            <tr>
                <td>Fournisseurs et comptes rattaches</td>
                <td>40</td>
                <td><?php echo $fourni ;?></td>
            </tr>
            <tr>
                <td>Avances recues des clients</td>
                <td>41</td>
                <td><?php echo $avances ;?></td>
            </tr>
            <tr>
                <td>Autres dettes</td>
                <td>40</td>
                <td><?php echo $dettes ;?></td>
            </tr>
            <tr>
                <td>Comptes de tresorerie</td>
                <td>5</td>
                <td><?php echo $tresor ;?></td>
            </tr>
            <tr>
                <td>TOTAL PASSIFS COURANT</td>
                <td><?php echo $sum ;?></td>
            </tr>

        </tbody>
    </table>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>