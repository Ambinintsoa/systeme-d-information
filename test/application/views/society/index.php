
    <title>Informations Entreprise</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

      <?php foreach( $society as $soc ) { ?>
      <section id="presentation" class="container mt-5">
        <div class="row">
          <div class="col-md-6">
            <img src="https://via.placeholder.com/400x300" alt="Logo de l'entreprise">
          </div>
          <div class="col-md-6">
            <h2>Name : <?php echo $soc->NAME ?></h2>
            <p>Object : <?php echo $soc->NAME ?></p>
            <ul>
              <li><strong>Leader : </strong><?php echo $soc->LEADER ?></li>
              <li><strong>Residence : </strong><?php echo $soc->RESIDENCE ?></li>
              <li><strong>Adress : </strong><?php echo $soc->ADDRESS ?></li>
              <li><strong>Tel : </strong><?php echo $soc->TEL ?></li>
              <li><strong>Email : </strong><?php echo $soc->EMAIL ?></li>
              <li><strong>Creation date : </strong><?php echo $soc->DATE_CREATION ?></li>
            </ul>
            <a href="Society_controller/edit/<?php echo $soc->ID;?>"><button class="btn btn-primary">edit</button></a>
            <a href="Society_controller/delete/<?php echo $soc->ID;?>"><button class="btn btn-secondary">delete</button></a>
          </div>
        </div>
      </section>
      <?php } ?>

      <style>
        ul li {
          overflow:hidden;
        }
      </style>
      

