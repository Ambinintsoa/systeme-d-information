<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<div class="container mt-3">
  <div class="row">
    <form action="<?php echo (base_url('Balance1')); ?>" method="get">
      <div class="col-md-4 col-sm-4">
        <label>Devise</label>

        <select class="form-select col-md-1 col-sm-2 journal" name="devise" aria-label=" example" required="">
          <?php foreach ($alldevise['alldevise'] as $ad) { ?>
            <option value="<?php echo $ad['id']; ?>"><?php echo $ad['name']; ?></option>
          <?php } ?>
        </select>
        <button type="submit" class="btn btn-success mb-2 posedit theme-color btn3">Valider</button>
      </div>
    </form>
    <div class="col-md-8 mx-auto">
      <div class="card">
        <div class="card-header">
          <h4>Balance</h4>
        </div>
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Numero de compte</th>
                <th scope="col">Intitule des comptes</th>
                <th scope="col">Debit (<?php echo $devise['devise']['name']; ?>)</th>
                <th scope="col">Credit (<?php echo $devise['devise']['name']; ?>)</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($operation['operation'] as $op) { ?>
                <tr>
                  <th scope="col"><?php echo $op['num_compte']; ?></th>
                  <th scope="col"><?php echo $op['nom_compte']; ?></th>
                  <th scope="col"><?php
                                  if ($op['type'] == 1) {
                                    echo ($op['somme'] / $devise['devise']['equivalence']);
                                  } else {
                                    echo '';
                                  }
                                  ?></th>
                  <th><?php if ($op['type'] == 0) {
                        echo ($op['somme'] / $devise['devise']['equivalence']);
                      } else {
                        echo '';
                      } ?></th>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
