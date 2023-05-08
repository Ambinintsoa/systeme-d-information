<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Etatfinancier_actif extends CI_Controller
{

    public function index()
    {
        $this->load->model('Etat_financier');
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
        $brut['immoinc'] = $this->Etat_financier->get_valeur_brut(20000, 21000, $this->session->userdata('exercice'));
        $brut['immocor'] = $this->Etat_financier->get_valeur_brut(21000, 22000, $this->session->userdata('exercice'));
        $brut['immobio'] = $this->Etat_financier->get_valeur_brut(22000, 23000, $this->session->userdata('exercice'));
        $brut['immoec'] = $this->Etat_financier->get_valeur_brut(23000, 24000, $this->session->userdata('exercice'));
        $brut['immofin'] = $this->Etat_financier->get_valeur_brut(25000, 26000, $this->session->userdata('exercice'));
        $brut['impodif'] = $this->Etat_financier->get_valeur_brut(13000, 14000, $this->session->userdata('exercice'));
        $brut['seec'] = $this->Etat_financier->get_valeur_brut(30000, 40000, $this->session->userdata('exercice'));
        $brut['ceea'] = $this->Etat_financier->get_valeur_brut(40000, 41000, $this->session->userdata('exercice'));
        $brut['cead'] = $this->Etat_financier->get_valeur_brut(41000, 42000, $this->session->userdata('exercice'));
        $brut['impoben'] = $this->Etat_financier->get_valeur_brut(44000, 45000, $this->session->userdata('exercice'));
        $brut['aceaa'] = $this->Etat_financier->get_valeur_brut(45000, 46000, $this->session->userdata('exercice'));
        $brut['teedt'] = $this->Etat_financier->get_valeur_brut(50000, 60000, $this->session->userdata('exercice'));
        $brut['totalac'] = $brut['seec'] + $brut['ceea'] + $brut['cead'] + $brut['impoben'] + $brut['aceaa'] + $brut['teedt'];
        $brut['totalanc'] = $brut['immoinc'] + $brut['immocor'] + $brut['immobio'] + $brut['immoec'] + $brut['immofin'] + $brut['impodif'];
        $brut['totalda'] = $brut['immoinc'] + $brut['immocor'] + $brut['immobio'] + $brut['immoec'] + $brut['immofin'] + $brut['impodif'] + $brut['seec'] + $brut['ceea'] + $brut['cead'] + $brut['impoben'] + $brut['aceaa'] + $brut['teedt'];
        
        $amort['immoinc'] = $this->Etat_financier->get_valeur_amort(28000, $this->session->userdata('exercice'));
        $amort['immocor'] = $this->Etat_financier->get_valeur_amort(28100, $this->session->userdata('exercice'));
        $amort['immobio'] = $this->Etat_financier->get_valeur_amort(28200, $this->session->userdata('exercice'));
        $amort['immoec'] = $this->Etat_financier->get_valeur_amort(28300, $this->session->userdata('exercice'));
        $amort['immofin'] = $this->Etat_financier->get_valeur_amort(28500, $this->session->userdata('exercice'));
        $amort['impodif'] = $this->Etat_financier->get_valeur_amort(18300, $this->session->userdata('exercice'));
        $amort['seec'] = $this->Etat_financier->get_valeur_amort(38000, $this->session->userdata('exercice'));
        $amort['ceea'] = $this->Etat_financier->get_valeur_amort(48000, $this->session->userdata('exercice'));
        $amort['cead'] = $this->Etat_financier->get_valeur_amort(48100, $this->session->userdata('exercice'));
        $amort['impoben'] = $this->Etat_financier->get_valeur_amort(48400, $this->session->userdata('exercice'));
        $amort['aceaa'] = $this->Etat_financier->get_valeur_amort(48500, $this->session->userdata('exercice'));
        $amort['teedt'] = $this->Etat_financier->get_valeur_amort(58000, $this->session->userdata('exercice'));

        $data = [
            'brut'=>$brut,
            'amort'=>$amort,
            'valeur'=>$valeur
        ];

        $this->load->view('header');
        $this->load->view('liste_actifs', $data);
        $this->load->view('footer');
    }
}
