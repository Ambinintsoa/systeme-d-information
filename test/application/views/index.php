<div class="container">
    <h2>Liste des comptes</h2>
    <p>
        <a href="<?php echo site_url('plan_comptable/create'); ?>" class="btn btn-primary">Créer un nouveau compte</a>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>Classe</th>
                <th>Compte</th>
                <th>Description</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comptes as $compte): ?>
                <tr>
                    <td><?php echo $compte['classe']; ?></td>
                    <td><?php echo $compte['compte']; ?></td>
                    <td><?php echo $compte['description']; ?></td>
                    <td>
                        
                        <a href="<?php echo site_url('plan_comptable/edit/'.$compte['id']); ?>" class="btn btn-warning">Modifier</a>
                        <a href="<?php echo site_url('plan_comptable/delete/'.$compte['id']); ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce compte ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
