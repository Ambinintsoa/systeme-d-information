<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Etatfinancierpassif extends CI_Controller
{

    public function index()
    {
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
        $this->load->model('Etat_financier');
        $valeur['capit'] = $this->Etat_financier->get_valeur_brut(10100, 10200, $this->session->userdata('exercice'));
        $valeur['reser'] = $this->Etat_financier->get_valeur_brut(10500, 10600, $this->session->userdata('exercice'));
        $valeur['result_inst'] = $this->Etat_financier->get_valeur_brut(12800, 12900, $this->session->userdata('exercice'));
        $valeur['result_net'] = $this->Etat_financier->get_valeur_brut(12000, 12100, $this->session->userdata('exercice'));
        $valeur['capi_prop'] = $this->Etat_financier->get_valeur_brut(11000, 12000, $this->session->userdata('exercice'));
        $valeur['empr'] = $this->Etat_financier->get_valeur_brut(16100, 16200, $this->session->userdata('exercice'));
        $valeur['dette'] = $this->Etat_financier->get_valeur_brut(16500, 16600, $this->session->userdata('exercice'));
        $valeur['fourni'] = $this->Etat_financier->get_valeur_brut(40000, 41000, $this->session->userdata('exercice'));
        $valeur['avances'] = $this->Etat_financier->get_valeur_brut(41000, 42000, $this->session->userdata('exercice'));
        $valeur['dettes'] = $this->Etat_financier->get_valeur_brut(40000, 50000, $this->session->userdata('exercice'));
        $valeur['tresor'] = $this->Etat_financier->get_valeur_brut(50000, 60000, $this->session->userdata('exercice'));
        $valeur['impot'] = $this->Etat_financier->get_valeur_brut(13000, 14000, $this->session->userdata('exercice'));
        $valeur['sum'] = $valeur['capit']+$valeur['reser']+ $valeur['result_inst']+$valeur['result_net']+$valeur['capi_prop']+ $valeur['empr']+$valeur['dette']+$valeur['fourni']+$valeur['avances']+$valeur['dettes']+$valeur['tresor']+$valeur['impot'];
        $this->load->view('header');
        $this->load->view('liste_passifs', $valeur);
        $this->load->view('footer');
    }
}
