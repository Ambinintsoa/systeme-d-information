<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analytique extends CI_Controller
{
    public function index()
    {
        $this->load->view('header');
        $this->load->model('Compte_produit_centre');
        $data['list'] = $this->Compte_produit_centre->getAllAbout();
        $data['sumall'] = $this->Compte_produit_centre->sumAll();
        $data['sumfixe'] = $this->Compte_produit_centre->sumFixe();
        $data['sumvariable'] = $this->Compte_produit_centre->sumVariable();
        $this->load->view('analytique', $data);
        $this->load->view('footer');
    }
}
