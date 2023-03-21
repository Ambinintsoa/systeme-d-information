<link rel="stylesheet" href="<?php echo base_url('css/custom.css'); ?> ">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('icons/bootstrap-icons.css'); ?>">
<script src="<?php echo base_url('js/popper.min.js'); ?>"></script>
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('js/bootstrap.bundle.min.js'); ?>"></script>

<body>
    <div class="content">
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