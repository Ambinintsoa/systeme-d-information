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
          <h4>Modification</h4>
        </div>
        <div class="card-body">
          <form method="POST" action="<?php echo site_url('Plan_comptable/edit/' . $compte->id);?>">
            <div class="form-group">
              <label for="code">Numero</label>
              <input type="text" name="num_compte" id="code" class="form-control" required value="<?php echo $compte->num_compte; ?>">
            </div>
            <div class="form-group">
              <label for="libelle">Nom du compte</label>
              <input type="text" name="nom_compte" id="libelle" class="form-control" value="<?php echo $compte->nom_compte; ?>">
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-primary">Modifier</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>