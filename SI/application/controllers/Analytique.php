<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analytique extends CI_Controller
{
    public function index()
    {
        $this->load->view('header');
        $this->load->model('Compte_produit_centre');
        if (isset($_GET['valeur'])) {
            $data['valeur'] = $_GET['valeur'];
        } else {
            $data['valeur'] = 0;
        }
        $data['list'] = $this->Compte_produit_centre->fonctionnelle();
        $data['sumall'] = $this->Compte_produit_centre->sumAll();
        $data['sumfixe'] = $this->Compte_produit_centre->sumFixe();
        $data['sumvariable'] = $this->Compte_produit_centre->sumVariable();
        $this->load->view('analytique', $data);
    }
}
