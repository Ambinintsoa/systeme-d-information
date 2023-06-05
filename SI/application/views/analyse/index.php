<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="<?php echo base_url("assets/css/analyse.css");?>">
   <script src="<?php echo base_url("assets/js/analyse.js"); ?>">
   </script>
    <title>Analyse</title>

</head>
<body>

    <div class="frame">
    <a href="#" class="btn accentcheckboxHover" style="margin-left: 5px;" onclick="close_window()"><i class="fas fa-window-close btnNoBorders" style="color: #DC3545;"></i></a>
        <div class="frame__title">
            <h3>COMPTE ANALYTIQUE</h3>
           
        </div>
        <div class="frame__notification">  
        </div>
        <div class="frame__quantite">
            <form action="" method="post">
            <label for="frame__quantite__name">Prix Unitaire</label>
                <input type="text" name="" id="" class="frame__quantite__pu" class="frame__quantite__pu " onchange="verif_sum(<?php echo count($produit);?>">
                <label for="frame__quantite__name">Quantite</label>
                <input type="text" name="" id="frame__quantite__qte" class="frame__quantite__qte" onchange="verif_sum(<?php echo count($produit);?>">
            </form>
        </div>
        <div class="frame__incorporable">
            <form action="" method="post">
                <div class="frame__incorporable__contenant">
                    <label for="frame__incorporable__ensemble__center__name">COMPTE INCORPORABLE</label>
                    <input type="checkbox" name="nature" class="frame__incorporable__checkbox" value="1" onclick="display()">
                </div>
            </form>
        </div>
        <div class="frame__corporable">
        <form action="" method="post">
        <?php for ($i=0;$i<count($produit);$i++){?>
                <div class="frame__corporable__ensemble">
                    <div class="frame__corporable__ensemble__product">
                        <label for="frame__corporable__ensemble__product__name"><?php echo $produit[$i]->nom;?></label>
                        <input type="number" name="" id="<?php echo $produit[$i]->id;?>" class="product<?php echo $i ;?>" onchange="verif_sum(<?php echo count($produit);?>)">
                    </div>
                <div class="frame__corporable__ensemble__center">
                       <?php for($j = 0 ;$j <count($centre);$j++){?>
                    <div class="frame__corporable__ensemble__center__info ">
                        <div class="input ">
                        <label for="frame__corporable__ensemble__center__name">  <?php echo $centre[$j]->nom;?></label> 
                            <input type="number" name="" id="<?php echo $centre[$j]->id;?>" class=" center center<?php echo $i ;?>" onchange="verif_sum(<?php echo count($produit);?>)"> 
                            <?php for ($s=0; $s< count($nature); $s++) { ?>
                                <label for="frame__nature__name"><?php echo $nature[$s]->nom;?></label>  
                            <input type="number" name="nature" id="<?php echo $nature[$s]->id;?>" class="frame__nature__input<?php echo $i.$j;?> fixe<?php echo $j;?> " onchange="verif_sum(<?php echo count($produit);?>)">   
                           <?php  }?>

                        </div> 
                    </div>
                        <?php } ?>
                    </div>
                </div>
            <?php } ?>
            </form>
        </div>
            <div class="frame__validity">
                <center>
                <button class="frame__validity__button" onclick="validation('<?php echo base_url(); ?>Analyse/insert/');">valider</button>
                </center>
            </div>
    </div>
</body>
</html>