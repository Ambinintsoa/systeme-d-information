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
          <h4>Plan comptable</h4>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Numero</th>
                <th>Nom du compte</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($comptes as $compte) { ?>
                <tr>
                  <td><?php echo $compte->num_compte; ?></td>
                  <td><?php echo $compte->nom_compte; ?></td>
                  <td><a href="Plan_comptable/edit/<?php echo $compte->id; ?>"><button class="btn btn-primary">edit</button></a></td>
                  <td><a href="Plan_comptable/delete/<?php echo $compte->id; ?>"><button class="btn btn-secondary">delete</button></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>