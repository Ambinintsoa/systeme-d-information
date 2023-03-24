<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

<body>
    <div class="container">
        <!-- form -->
        <h3>GRAND LIVRE</h3>

        <!-- table -->
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Identifiant</th>
                    <th scope="col">Numero de compte</th>
                    <th scope="col">Nom compte</th>
                    <th scope="col">Debit</th>
                    <th scope="col">Credit</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($operation as $op) { ?>
                    <tr>
                        <th scope="col"><?php echo $op['id']; ?></th>
                        <th scope="col"><?php echo $op['num_compte']; ?></th>
                        <th scope="col"><?php echo $op['nom_compte']; ?></th>
                        <th scope="col"><?php
                        if ($op['type'] == 1) {
                            echo $op['somme'];
                        } else {
                            echo '';
                        }
                         ?></th>
                        <th><?php if ($op['type'] == 0) {
                            echo $op['somme'];
                        } else {
                            echo '';
                        } ?></th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>