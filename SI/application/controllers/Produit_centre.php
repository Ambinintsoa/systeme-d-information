<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produit_centre extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produit_centre_model');
    }
    public function index()
    {
        if (isset($_POST['vp']) && $_POST['vp']>1 ) {
            $vp=$_POST['vp'];
        }else{
            $vp=1;
        }
        $this->load->view('header');
        $data['pc'] = $this->Produit_centre_model->getprix($vp);
        $data['sumx'] = $this->Produit_centre_model->sumprod($vp);
        $data['sumc'] = $this->Produit_centre_model->sumcentre($vp);
        $this->load->view('produit_centre',$data);
        $this->load->view('footer');
    }
}
