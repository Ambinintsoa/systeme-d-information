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
          <h4>Liste des codes</h4>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Code</th>
                <th>Libellé</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($codes as $code) { ?>
                <tr>
                  <td><?php echo $code->code; ?></td>
                  <td><?php echo $code->libelle; ?></td>
                  <td><a href="Codejournal/edit/<?php echo $code->id; ?>"><button class="btn btn-primary">edit</button></a></td>
                  <td><a href="Codejournal/delete/<?php echo $code->id; ?>"><button class="btn btn-secondary">delete</button></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>