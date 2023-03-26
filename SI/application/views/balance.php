<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BALANCE</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/parsley.js"></script>
</head>

<body>
  <?php
  if ($this->session->has_userdata('transaction')) {
    // var_dump($this->session->userdata('transaction'));

    $this->session->unset_userdata('code');
  } else {
    $transaction = array();
    $this->session->set_userdata('transaction', $transaction);
  }
  ?>
  <div class="error"> </div>

  <div class="container">

    <!-- form -->
    <h3>BALANCE</h3>
    <?php if (!isset($_SESSION['journal'])) { ?>
      <form action="" id="code">
        <div class="col-md-4 col-sm-4">
          <label>Code Journal</label>
          <select class="form-select col-md-1 col-sm-2 journal" name="journal" aria-label=" example" required="">
            <?php
            for ($i = 0; $i < count($code); $i++) { ?>
              <option value="<?php echo $code[$i]->id; ?>"><?php echo $code[$i]->code; ?></option>
            <?php } ?>
          </select>
          <button type="submit" class="btn btn-secondary mb-2 posedit theme-color btn3">Valider</button>
        </div>
      </form>
    <?php } ?>
    <form action="" id="validate"></form>
    <div class="reinitialize"><a href="<?php echo (base_url()) ?>Balance/delete"><button class="btn btn-secondary ">Reinitialize </button> </a></div>
    <form class="row" data-parsley-validate="" id="form" method="get">
      <div class="col-md-2 col-sm-2">
        <label>Date du</label>
        <input type="date" class="form-control date" name="date" required="">
      </div>

      <div class="col-md-2 col-sm-2">
        <label>Compte</label>
        <input type="text" class="form-control compte" placeholder="XXXXX" name="compte" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-validation-threshold="1" required="">
      </div>
      <div class="col-md-2 col-sm-2">
        <label>Compte tiers</label>
        <input type="text" class="form-control tiers" value="" placeholder="XXXXX" name="tiers" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-validation-threshold="1">
      </div>
      <div class="col-md-2 col-sm-2">
        <label>montant</label>
        <input type="number" class="form-control montant" placeholder="XXXXX" name="montant" required="">
      </div>
      <div class="col-md-1 col-sm-1">
        <label>Devise</label>
        <select class="form-select  col-md-1 col-sm-1 devise" name="devise" aria-label=" example" required="">
          <option value="1">DEBIT</option>
          <option value="0">CREDIT</option>
        </select>
      </div>
      <div class="col-md-1 col-sm-1">
        <label></label>
        <select class="form-select  col-md-1 col-sm-2 situation" name="situation" aria-label=" example" required="">
          <option value="1">DEBIT</option>
          <option value="0">CREDIT</option>
        </select>
      </div>
      <center>
        <div class="col-auto">
          <form action="" id="validate"></form>
          <button type="submit" class="btn btn-secondary mb-2 posedit theme-color btn1">Valider</button>
        </div>
      </center>
    </form>

    <!-- table -->
    <table class="table">
      <thead class="table-dark">
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Journal</th>
          <th scope="col">Compte</th>
          <th scope="col">Compte tiers</th>
          <th scope="col">debit</th>
          <th scope="col">credit</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
      <?php for ($i = 0; $i < count($_SESSION['transaction']); $i++) { ?>
        <tr>
          <th scope="col"><?php echo $_SESSION['transaction'][$i]['date']; ?></th>
          <th scope="col"><?php echo $this->Balance_model->selectCode($_SESSION['journal'])->code; ?></th>
          <th scope="col"><?php echo $_SESSION['transaction'][$i]['compte']; ?></th>
          <th scope="col"><?php echo $_SESSION['transaction'][$i]['tiers']; ?></th>
          <?php if ($_SESSION['transaction'][$i]['situation'] == 1) { ?>
            <th scope="col"><?php echo $_SESSION['transaction'][$i]['montant']; ?></th>
            <th scope="col"></th>
          <?php } else { ?>
            <th scope="col"></th>
            <th scope="col"><?php echo $_SESSION['transaction'][$i]['montant']; ?></th>
          <?php } ?>
        </tr>
      <?php } ?>
    </table>
    <center>
      <div class="col-auto auto1">
      </div>
    </center>
  </div>
</body>

</html>

<script src="<?php echo base_url(); ?>assets/js/balance.js"></script>

<?php if (isset($_SESSION['journal'])) {
  $this->load->model('Balance_model');

?>
  <script>
    $(document).ready(function() {
      sendform('<?php echo base_url(); ?>Balance/register', <?php echo json_encode($_SESSION['transaction']); ?>, '<?php echo $this->Balance_model->selectCode($_SESSION['journal'])->code; ?>');
      validate('<?php echo base_url(); ?>Balance/validate');
    });
    verif(<?php echo json_encode($_SESSION['transaction']); ?>);
  </script>
<?php } else { ?>
  <script>
    $(document).ready(function() {
      sendcode('<?php echo base_url(); ?>Balance/code');
    });
  </script>
<?php } ?>