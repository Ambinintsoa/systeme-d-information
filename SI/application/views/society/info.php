<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/parsley.js"></script>

<div class="container mt-3">
<div class="card-header">
          <h4>Information Societe</h4>
        </div>
<?php foreach ($society as $soc) {?>
<div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Name</h5>
    </div>
    <p class="mb-1"><?php echo $soc->name ;?></p>
  </a>
  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Object</h5>
    </div>
    <p class="mb-1"><?php echo $soc->object ;?></p>
  </a>
  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Leader</h5>
    </div>
    <p class="mb-1"><?php echo $soc->leader ;?></p>
  </a>
  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Residence</h5>
    </div>
    <p class="mb-1"><?php echo $soc->residence ;?></p>
  </a>
  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Adress</h5>
    </div>
    <p class="mb-1"><?php echo $soc->address ;?></p>
  </a>
  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Tel</h5>
    </div>
    <p class="mb-1"><?php echo $soc->tel ;?></p>
  </a>
  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Email</h5>
    </div>
    <p class="mb-1"><?php echo $soc->email ;?></p>
  </a>
  <a href="#" class="list-group-item list-group-item-action">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Date de creation</h5>
    </div>
    <p class="mb-1"><?php echo $soc->date_creation ;?></p>
  </a>
</div>
</div>
<?php } ?>