<!-- Début du formulaire de création -->
<div class="container mt-3">
    <h2>Ajouter un compte au plan comptable</h2>
    <form method="post" action="<?php echo site_url('plan_comptable/add_compte'); ?>">
        <div class="form-group">
            <label for="classe">Classe :</label>
            <input type="text" class="form-control" id="classe" name="classe" required>
        </div>
        <div class="form-group">
            <label for="compte">Compte :</label>
            <input type="text" class="form-control" id="compte" name="compte" required>
        </div>
        <div class="form-group">
            <label for="description">Description :</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
<!-- Fin du formulaire de création -->