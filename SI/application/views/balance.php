<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/custom.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="icons/bootstrap-icons.css">
    <script src="<?php echo base_url('assets/js/popper.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/parsley.min.js');?>"></script>
  </head>
  <body>
    <div class="content">
        <!-- form -->
        <h3>BALANCE</h3>
        <form class="row" data-parsley-validate="">
          <div class="col-md-2 col-sm-2">
            <label>Date du</label>
            <input type="date" class="form-control"  placeholder="Input 2" required="">
        </div>
          <div class="col-md-2 col-sm-2">
            <label>Code Journal</label>
            <select class="form-select  col-md-1 col-sm-2" aria-label=" example" required="" >
              <option value="1">DEBIT</option>
              <option value="0">CREDIT</option>
            </select>
          </div>
            <div class="col-md-2 col-sm-2">
              <label >Compte</label>
              <input type="text" class="form-control"  placeholder="XXXXX" name="compte" data-parsley-trigger="keyup" data-parsley-minlength="5"  data-parsley-validation-threshold="1" required="">
          </div>
            <div class="col-md-2 col-sm-2">
                <label>Compte tiers</label>
                <input type="text" class="form-control"  placeholder="XXXXX" name="tiers" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-validation-threshold="1" >
            </div>
            <div class="col-md-2 col-sm-2">
              <label>montant</label>
              <input type="number" class="form-control"  placeholder="XXXXX" name="montant" required="">
          </div>
          <div class="col-md-1 col-sm-1">
            <label>Devise</label>
            <select class="form-select  col-md-1 col-sm-1" aria-label=" example" required="">
              <option value="1">DEBIT</option>
              <option value="0">CREDIT</option>
            </select>
          </div>
          <div class="col-md-1 col-sm-1">
            <label></label>
            <select class="form-select  col-md-1 col-sm-2" aria-label=" example" required="">
              <option value="1">DEBIT</option>
              <option value="0">CREDIT</option>
            </select>
          </div>
          <center>
          <div class="col-auto">
            <button type="submit" class="btn btn-secondary mb-2 posedit theme-color">Valider</button>
        </div>
      </center>
          </div>
        </form>

        <!-- table -->
        <table class="table">
            <thead class="table-dark">
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Journal</th>
                <th scope="col">Compte</th>
                <th scope="col">Compte tiers</th>
                <th scope="col">Montant</th>
                <th scope="col">debit</th>
                <th scope="col">credit</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>row 1</td>
                <td>row 1</td>
                <td>row 1</td>
                <td>row 1</td>
                <td>row 1</td>
                <td>row 1</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>row 2</td>
                <td>row 2</td>
                <td>row 2</td>
                <td>row 2</td>
                <td>row 2</td>
                <td>row 2</td>
              </tr>
            </tbody>
          </table>
          <center>
          <div class="col-auto">
            <button type="submit" class="btn btn-secondary mb-2 posedit theme-color">GENERER</button>
        </div>
      </center>
    </div>
  </body>
</html>
