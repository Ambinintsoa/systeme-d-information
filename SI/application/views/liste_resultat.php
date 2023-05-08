<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/parsley.js"></script>

<section>
  <div style="padding-top: 60px;padding-bottom: 30px;">
    <div class="container" style="padding-bottom: 10px;">
      <div class="row" style="margin-top: 44px;">
        <div class="col-md-6 col-lg-5">
          <h2 class="h4" style="margin-top: 35px;color: #00b5a8;border-color: #23295f;">SOCIETE</h2>
          <div style="padding-top: 0px;"><span><strong>Adresse :</strong></span><span style="margin-left: 5px;"><?php echo $society[0]->address ;?></span></div>
          <div style="padding-top: 0px;"><span><strong>Capitale:</strong></span><span style="margin-left: 5px;"><?php echo $society[0]->residence ;?></span></div>
          <div style="padding-top: 0px;"><span><strong>NIF:</strong></span><span style="margin-left: 5px;"><?php echo $nif;?></span></div>
          <div style="padding-top: 0px;"><span><strong>STAT:</strong></span><span style="margin-left: 5px;"><?php echo $stat;?></span></div>
          <div></div>
          <div style="padding-top: 0px;"></div>
          <div style="padding-top: 0px;"></div>
          <h2 class="h4" style="margin-top: 15px;color: #00b5a8;">BILAN</h2>
          <div style="padding-top: 0px;"><span><strong>Exercice clos au :</strong></span><span style="margin-left: 5px;"><?php  echo $exercice;?></span></div>
          <div style="padding-top: 0px;"><span><strong>Unite monetaire :</strong></span><span style="margin-left: 5px;">Ariary</span></div>
          <div style="padding-top: 0px;"></div>
        </div>
        <div class="col-md-12 col-lg-7"></div>
      </div>
    </div>
  </div>
</section>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th>Comptes</th>
                <th>Dates Fin Exercices</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Chiffre d affaires</td>
                <td>70</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Production stockee</td>
                <td>71</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td><strong>I. PRODUCTION DE L EXERCICE</strong></td>
                <td><strong><?php echo $prod_exo; ?></strong></td>
            </tr>

            <tr>
                <td>Achat consommes</td>
                <td>60</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Services exterieurs et autres consommations</td>
                <td>61/62</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td><strong>II. CONSOMMATION DE L EXERCICE </strong></td>
                <td><strong><?php echo $conso_exo; ?></strong></td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td><strong>III. VALEUR AJOUTEE D EXPLOITATION (I-II) </strong></td>
                <td><strong><?php echo $valeur_ajout; ?></strong></td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Charges de personnel</td>
                <td>64</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Impots, taxes et versements assimiles</td>
                <td>63</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td><strong>IV. EXCEDENT BRUT D EXPLOITATION </strong></td>
                <td><strong><?php echo $exedent; ?></strong></td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Autres produits operationnels</td>
                <td>75</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Autres charges operationnels</td>
                <td>65</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Dotations aux amortissements, aux provisions et pertes de valeur</td>
                <td>63</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Reprise sur provisions et pertes de valeur</td>
                <td>78</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td><strong>V. RESULTAT OPERATIONNEL</strong></td>
                <td><strong><?php echo $operationel; ?></strong></td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Produits financiers</td>
                <td>76</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Charges financieres</td>
                <td>66</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td><strong>VI. RESULTAT FINANCIER</strong></td>
                <td><strong><?php echo $result_finance; ?></strong></td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td><strong>VII. RESULTAT AVANT IMPOTS (V+VI)</strong></td>
                <td><strong><?php echo $res_av_impot; ?></strong></td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Impots exigibles sur resultats</td>
                <td>695</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Impots differes (variations)</td>
                <td>692</td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td><strong>TOTAL DES PRODUITS DES ACTIVITES ORDINAIRES</strong></td>
                <td><strong><?php echo $tot_prod; ?></strong></td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td><strong>TOTAL DES CHARGES DES ACTIVITES ORDINAIRES</strong></td>
                <td><strong><?php echo $tot_charge; ?></strong></td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td><strong>VIII. RESULTAT DES ACTIVITES ORDINAIRES</strong></td>
                <td><strong><?php echo $result; ?></strong></td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td>Elements extraordinaires (produits)</td>
                <td>77</td>
                <td><strong><?php echo $extra_prod; ?></strong></td>
            </tr>
            <tr>
                <td>Elements extraordinaires (charges)</td>
                <td>67</td>
                <td><strong><?php echo $extra_charge; ?></strong></td>
            </tr>
            <tr>
                <td><strong>IX . RESULTAT EXTRAORDINAIRES</strong></td>
                <td><strong><?php echo $result_extra; ?></strong></td>
                <td><?php  echo $exercice;?></td>
            </tr>
            <tr>
                <td><strong>X. RESULTAT NET DE L EXERCICE</strong></td>
                <td><strong><?php echo $result_net; ?></strong></td>
                <td><?php  echo $exercice;?></td>
            </tr>

        </tbody>
    </table>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>