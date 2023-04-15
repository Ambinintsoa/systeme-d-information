<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

<div class="container mt-3">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <div class="card">
        <div class="card-header">
          <h4>Grand Livre</h4>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Identifiant</th>
                <th scope="col">Numero de compte</th>
                <th scope="col">Nom compte</th>
                <th scope="col">Debit</th>
                <th scope="col">Credit</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($operation as $op) { ?>
                <tr>
                  <th scope="col"><?php echo $op['date']; ?></th>
                  <th scope="col"><?php echo $op['id']; ?></th>
                  <th scope="col"><?php echo $op['num_compte']; ?></th>
                  <th scope="col"><?php echo $op['nom_compte']; ?></th>
                  <th scope="col"><?php
                                  if ($op['type'] == 1) {
                                    echo $op['somme'];
                                  } else {
                                    echo '';
                                  }
                                  ?></th>
                  <th><?php if ($op['type'] == 0) {
                        echo $op['somme'];
                      } else {
                        echo '';
                      } ?></th>
                  <th><a href="<?php echo base_url('Grandlivre/edit/' . $op['num_operation']); ?>"><button class="btn btn-danger">delete</button></a></th>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>