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
          <div style="padding-top: 0px;"><span><strong>Adresse :</strong></span><span style="margin-left: 5px;"><?php echo $valeur['society'][0]->address ;?></span></div>
          <div style="padding-top: 0px;"><span><strong>Capitale:</strong></span><span style="margin-left: 5px;"><?php echo $valeur['society'][0]->residence ;?></span></div>
          <div style="padding-top: 0px;"><span><strong>NIF:</strong></span><span style="margin-left: 5px;"><?php echo $valeur['nif'];?></span></div>
          <div style="padding-top: 0px;"><span><strong>STAT:</strong></span><span style="margin-left: 5px;"><?php echo $valeur['stat'];?></span></div>
          <div></div>
          <div style="padding-top: 0px;"></div>
          <div style="padding-top: 0px;"></div>
          <h2 class="h4" style="margin-top: 15px;color: #00b5a8;">BILAN</h2>
          <div style="padding-top: 0px;"><span><strong>Exercice clos au :</strong></span><span style="margin-left: 5px;"><?php  echo $valeur['exercice'];?></span></div>
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
        <th colspan="3">Dates Fin Exercices </th>
      </tr>
      <tr>
        <th></th>
        <th></th>
        <th>Brutes</th>
        <th>Amortissement</th>
        <th>Net</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><strong>ACTIF NON COURANT</strong></td>
      </tr>
      <tr>
        <td>IMMOBILISATION INCORPORELLE</td>
        <td>20</td>
        <td><?php echo $brut['immoinc']; ?></td>
        <td><?php echo $amort['immoinc']; ?></td>
        <td><?php echo $brut['immoinc'] - $amort['immoinc']; ?></td>
      </tr>
      <tr>
        <td>IMMOBILISATION CORPORELLE</td>
        <td>21</td>
        <td><?php echo $brut['immocor']; ?></td>
        <td><?php echo $amort['immocor']; ?></td>
        <td><?php echo $brut['immocor'] - $amort['immocor']; ?></td>

      </tr>
      <tr>
        <td>IMMOBILISATION BIOLOGIQUE</td>
        <td>22</td>
        <td><?php echo $brut['immobio']; ?></td>
        <td><?php echo $amort['immobio']; ?></td>
        <td><?php echo $brut['immobio'] - $amort['immobio']; ?></td>

      </tr>
      <tr>
        <td>IMMOBILISATION EN COURS</td>
        <td>23</td>
        <td><?php echo $brut['immoec']; ?></td>
        <td><?php echo $amort['immoec']; ?></td>
        <td><?php echo $brut['immoec'] - $amort['immoec']; ?></td>

      </tr>
      <tr>
        <td>IMMOBILISATION FINANCIERES</td>
        <td>25</td>
        <td><?php echo $brut['immofin']; ?></td>
        <td><?php echo $amort['immofin']; ?></td>
        <td><?php echo $brut['immofin'] - $amort['immofin']; ?></td>

      </tr>
      <tr>
        <td>IMPOTS DIFFERES</td>
        <td>13</td>
        <td><?php echo $brut['impodif']; ?></td>
        <td><?php echo $amort['impodif']; ?></td>
        <td><?php echo $brut['impodif'] - $amort['impodif']; ?></td>

      </tr>
      <tr>
        <td>TOTAL ACTIF NON COURANT</td>
        <td><?php echo $brut['totalanc']; ?></td>
      </tr>



      <tr>
        <td><strong>ACTIF COURANT</strong></td>
      </tr>
      <tr>
        <td>STOCKS ET EN COURS</td>
        <td>3</td>
        <td><?php echo $brut['seec']; ?></td>
        <td><?php echo $amort['seec']; ?></td>
        <td><?php echo $brut['seec'] - $amort['seec']; ?></td>

      </tr>
      <tr>
        <td>CREANCES ET EMPLOIS ASSIMILES</td>
        <td>40</td>
        <td><?php echo $brut['ceea']; ?></td>
        <td><?php echo $amort['ceea']; ?></td>
        <td><?php echo $brut['ceea'] - $amort['ceea']; ?></td>

      </tr>
      <tr>
        <td>Clients et autres debiteurs</td>
        <td>41</td>
        <td><?php echo $brut['cead']; ?></td>
        <td><?php echo $amort['cead']; ?></td>
        <td><?php echo $brut['cead'] - $amort['cead']; ?></td>

      </tr>
      <tr>
        <td>Impots / Benefice </td>
        <td>44</td>
        <td><?php echo $brut['impoben']; ?></td>
        <td><?php echo $amort['impoben']; ?></td>
        <td><?php echo $brut['impoben'] - $amort['impoben']; ?></td>

      </tr>
      <tr>
        <td>Autres creances et actifs assimiles</td>
        <td>45</td>
        <td><?php echo $brut['aceaa']; ?></td>
        <td><?php echo $amort['aceaa']; ?></td>
        <td><?php echo $brut['aceaa'] - $amort['aceaa']; ?></td>

      </tr>
      <tr>
        <td>TRESORERIE ET EQUIVALENTS DE TRESORERIE</td>
        <td>5</td>
        <td><?php echo $brut['teedt']; ?></td>
        <td><?php echo $amort['teedt']; ?></td>
        <td><?php echo $brut['teedt'] - $amort['teedt']; ?></td>

      </tr>
      <tr>
        <td>TOTAL ACTIFS COURANTS</td>
        <td><?php echo $brut['totalac']; ?></td>
      </tr>
      <tr>
        <td>TOTAL DES ACTIFS</td>
        <td><?php echo $brut['totalda']; ?></td>
      </tr>
    </tbody>
  </table>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>