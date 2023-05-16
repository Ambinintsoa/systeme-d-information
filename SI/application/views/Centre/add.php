<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/parsley.js"></script>
<div class="container mt-3">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Ajouter Centre</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="Centre/add">
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom :</label>
				            <input type="text" class="form-control" id="nom" name="nom" required >
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
                        </div>
                    </form>
                    <form method="POST" action="Plan_comptable/import" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="code">Importer Excel</label>
                            <input type="file" name="file" id="file" required class="form-control">
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Importer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>