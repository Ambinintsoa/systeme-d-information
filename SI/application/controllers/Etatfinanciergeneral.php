<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Etatfinanciergeneral extends CI_Controller
{
    public function index()
    {
        $this->load->model('Etat_financier');
        //
        $this->load->model('Society_model');
        $this->load->model('Exercice_model');
        $this->load->model('Administration_model');
        if($this->Society_model->get_society() != null){
            $valeur['society'] = $this->Society_model->get_society();
        }else{
            $valeur['society'] = array();
            $valeur['society'][0] = new stdClass();
            $valeur['society'][0]->address = 'Not dispo';
            $valeur['society'][0]->residence = 'Not dispo';
        }
        
        $exo =$this->Exercice_model->get_last_exercice();
        date_default_timezone_set('Europe/Moscow');
        $valeur['exercice'] = date('d-M-Y',strtotime($exo[0]->debut.'+'.$exo[0]->duree.'months'));
        if($this->Administration_model->get_administration_by_name('NIF') !=null){
        $valeur['nif'] = $this->Administration_model->get_administration_by_name('NIF');
        }else{
            $valeur['nif'] = 'not found';
        }
        if($this->Administration_model->get_administration_by_name('STAT') !=null){
            $valeur['stat'] = $this->Administration_model->get_administration_by_name('STAT');
        }else{
            $valeur['stat'] = 'not found';
        }
        
        //
        $valeur['chi_affaire'] = $this->Etat_financier->get_valeur_brut(70000, 71000, $this->session->userdata('exercice'));
        $valeur['prod_stock'] = $this->Etat_financier->get_valeur_brut(71000, 72000, $this->session->userdata('exercice'));
        $valeur['prod_exo'] =   $valeur['chi_affaire']+ $valeur['prod_stock'];
        $valeur['achat_conso'] = $this->Etat_financier->get_valeur_brut(60000, 61000, $this->session->userdata('exercice'));
        $valeur['serv_ext'] = $this->Etat_financier->get_valeur_brut(61000, 63000, $this->session->userdata('exercice'));
        $valeur['conso_exo'] = $valeur['achat_conso']+ $valeur['serv_ext'];
        $valeur['valeur_ajout'] =  $valeur['prod_exo'] -  $valeur['conso_exo'];
        $valeur['charge_perso'] = $this->Etat_financier->get_valeur_brut(64000, 65000, $this->session->userdata('exercice'));
        $valeur['impot'] = $this->Etat_financier->get_valeur_brut(63000, 64000, $this->session->userdata('exercice'));
        $valeur['exedent'] = $valeur['charge_perso']  +$valeur['impot']  ;
        $valeur['prod_operation'] = $this->Etat_financier->get_valeur_brut(75000, 76000, $this->session->userdata('exercice'));
        $valeur['charge_operation'] = $this->Etat_financier->get_valeur_brut(65000, 66000, $this->session->userdata('exercice'));
        $valeur['dotation'] = $this->Etat_financier->get_valeur_brut(68000, 69000, $this->session->userdata('exercice'));
        $valeur['reprise'] = $this->Etat_financier->get_valeur_brut(78000, 79000, $this->session->userdata('exercice'));
        $valeur['operationel'] = $valeur['prod_operation'] -  $valeur['charge_operation'] -  $valeur['dotation'] + $valeur['reprise'];
        $valeur['prod_finance'] = $this->Etat_financier->get_valeur_brut(76000, 77000, $this->session->userdata('exercice'));
        $valeur['charge_finance'] = $this->Etat_financier->get_valeur_brut(66000, 67000, $this->session->userdata('exercice'));
        $valeur['result_finance'] = $valeur['prod_finance'] - $valeur['charge_finance'];
        $valeur['res_av_impot'] = $valeur['operationel'] + $valeur['result_finance'];
        $valeur['tot_prod'] = $valeur['prod_exo'] + $valeur['prod_operation']+  $valeur['reprise'] + $valeur['prod_finance'];
        $valeur['impot_exigible'] = $this->Etat_financier->get_valeur_brut(69500, 69200, $this->session->userdata('exercice'));
        $valeur['impot_diff'] = $this->Etat_financier->get_valeur_brut(69200, 69300, $this->session->userdata('exercice'));
        $valeur['tot_charge'] = $valeur['conso_exo'] + $valeur['exedent'] + $valeur['charge_operation'] + $valeur['dotation'] + $valeur['charge_finance']+$valeur['impot_exigible'] +  $valeur['impot_exigible'];
        $valeur['result'] = $valeur['tot_prod']  - $valeur['tot_charge'];
        $valeur['extra_prod'] = $this->Etat_financier->get_valeur_brut(77000, 78000, $this->session->userdata('exercice'));
        $valeur['extra_charge'] = $this->Etat_financier->get_valeur_brut(67000, 68000, $this->session->userdata('exercice'));
        $valeur['result_extra'] = $valeur['extra_prod'] - $valeur['extra_charge'];
        $valeur['result_net'] = $valeur['result'] + $valeur['result_extra'];
        $this->load->view('header');
        $this->load->view('liste_resultat', $valeur);
        $this->load->view('footer');
    }
}