<a href="plan_comptable/ajouter">Ajouter un compte</a>
<h1>Plan comptable</h1>
	<table>
		<thead>
			<tr>
				<th>Type de compte</th>
				<th>Numéro de compte</th>
				<th>Nom du compte</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($comptes as $compte) : ?>
				<tr>
					<td><?php echo $compte->type_compte; ?></td>
					<td><?php echo $compte->numero_compte; ?></td>
					<td><?php echo $compte->nom_compte; ?></td>
					<td><a href="plan_comptable/modifier/<?php echo $compte->id;?>">Modifier</a></td>
					<td><a href="plan_comptable/supprimer/<?php echo $compte->id;?>">Supprimer</a></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>