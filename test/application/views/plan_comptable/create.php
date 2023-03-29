<h1>Ajouter un compte</h1>
	<form action="<?php echo site_url('plan_comptable/ajouter');?>" method="post">
		<label for="type_compte">Type de compte :</label>
		<input type="text" name="type_compte" required><br>
		<label for="numero_compte">Numéro de compte :</label>
		<input type="text" name="numero_compte" required><br>
		<label for="nom_compte">Nom du compte :</label>
		<input type="text" name="nom_compte" required><br>
		<input type="submit" value="Ajouter">
	</form>