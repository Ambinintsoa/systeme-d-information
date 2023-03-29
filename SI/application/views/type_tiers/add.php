<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/parsley.js"></script>
<div class="container mt-3">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card">
        <div class="card-header">
          <h4>Ajouter un code</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="typetiers/add">
            <div class="form-group">
              <label for="code">Intitule</label>
              <input type="text" name="intitule" id="code" class="form-control" required>
            </div>
            <div class="form-group">
              <label for="libelle">Racine</label>
              <input type="text" name="racine" id="libelle" class="form-control">
            </div>
            
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>