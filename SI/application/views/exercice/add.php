<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/parsley.js"></script>

<div class="container">
		<h2>Nouvel exercice</h2>
		<form action="Exercice/add" method="post">
			<div class="form-group">
				<label for="debut">Date de début:</label>
				<input type="date" class="form-control" id="debut" name="debut">
			</div>
			<div class="form-group">
				<label for="duree">Durée (en mois):</label>
				<input type="number" class="form-control" id="duree" name="duree" value="12">
			</div>
			<div class="form-group">
				<label for="tva">TVA (%):</label>
				<input type="number" class="form-control" id="tva" name="tva" value="20">
			</div>
            <div class="form-group">
				<label for="tva">Solde:</label>
				<input type="number" class="form-control" id="tva" name="solde">
			</div>
			<button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
		</form>
	</div>