<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produit extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produit_model');
    }
    public function index()
    {
        $this->load->view('header');
        $this->load->view('produit/add');
        $this->load->view('footer');
    }
    
    public function add()
    {
        $this->Produit_model->add();
        redirect('Centre');
    }
}
