<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/parsley.js"></script>
<div class="container mt-3">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card">
        <div class="card-header">
          <h4>Type tiers</h4>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Imtitule</th>
                <th>Racine</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($comptes as $compte) { ?>
                <tr>
                  <td><?php echo $compte->intitule; ?></td>
                  <td><?php echo $compte->racine; ?></td>
                  <td><a href="typetiers/edit/<?php echo $compte->id; ?>"><button class="btn btn-primary">edit</button></a></td>
                  <td><a href="typetiers/delete/<?php echo $compte->id; ?>"><button class="btn btn-secondary">delete</button></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>