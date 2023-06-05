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
                    <form method="POST" action="Centre/add" id="myForm">
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom :</label>
				            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="form-group mt-3">
                        <label for="nom" class="form-label">Type</label>
				            <p>
                                <input type="checkbox" class="form-check-input" id="check" name="check" value="0">
                                Structurel
                            </p>
                            <p>
                                <input type="checkbox" class="form-check-input" id="fonctionnel" name="check" value="1" >
                                Fonctionnel
                            </p>
                        </div>
                        <div class="hidden" id="form">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Pourcentage</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($centre as $center) { ?>
                                    <tr>
                                        <td><?php echo $center->nom; ?></td>
                                        <td>
                                        <input type="number" class="form-control pourcentage" name="<?php echo $center->nom; ?>">
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary" name="submit">Valider</button>
                        </div>
                    </form>
                    <form method="POST" action="Plan_comptable/import" enctype="multipart/form-data" >
                        <div class="form-group mt-3">
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
<style>
    .hidden{
        display:none;
    }
</style>
<script>
    const checkbox = document.getElementById("check");
    const checkboxf = document.getElementById("fonctionnel");
    const formulaire = document.getElementById("form");

    checkbox.addEventListener("change", function(){
        if(this.checked){
            checkboxf.disabled = true;
            formulaire.classList.remove("hidden");
            document.getElementById('myForm').addEventListener('submit', function(event) {                 
                // Get all the pourcentage input fields
                const pourcentageInputs = document.querySelectorAll('.pourcentage');

                let sum = 0;
                for (let i = 0; i < pourcentageInputs.length; i++) {
                    const value = parseFloat(pourcentageInputs[i].value);
                    if (!isNaN(value)) {
                        sum += value;
                    }
                }
                if (sum !== 100) {
                // Prevent form submission
                event.preventDefault();    
                alert('La somme des pourcentages doit etre egale a 100\n\----\n\Total Pourcentage: ' + sum);
                } 
            });
        }else{
            checkboxf.disabled = false;
            formulaire.classList.add("hidden");
        }
    });
    checkboxf.addEventListener("change", function(){
        if(this.checked){
            checkbox.disabled = true;
        }else{
            checkbox.disabled = false;
        }
    });


    
</script>