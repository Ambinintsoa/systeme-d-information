<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/parsley.js"></script>
<?php

?>
<div class="container mt-3">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card">
        <div class="card-header">
          <h4>/</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="produit_centre">
              <div class="form-group">
                <label for="vp" class="form-label">Volume de production :</label>
                <input type="numeric" class="form-control" id="vp" name="vp" required >
              </div>
              <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
              </div>
          </form>
          <table class="table table-striped">
            <thead>
              <tr>
                <th></th>
                <?php for ( $i = 1 ; $i < count($pc[1]) ; $i++ ) { ?>
                <th>Centre <?php echo $i; ?></th>
                <?php } ?>
                <th>Total</th> 
              </tr> 
            </thead>
            <tbody>
              <?php for ( $j = 1 ; $j < count($pc)+1 ; $j++ ) { ?>
                <tr>
                  <th>produit <?php echo $j; ?></th>
                  <?php for ( $i = 1 ; $i < count($pc[1]) ; $i++ ) { ?>
                    <th><?php echo $pc[$j][$i];?></th>
                  <?php } ?>
                  <th><?php  echo $sumx[$j]; ?></th>
                </tr>
              <?php } ?>
                <th>Total</th> 
                <?php for ( $i = 1 ; $i < count($pc[1]) ; $i++ ) { ?> 
                  <th><?php  echo $sumc[$i]; ?></th>
                <?php } ?> 
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>