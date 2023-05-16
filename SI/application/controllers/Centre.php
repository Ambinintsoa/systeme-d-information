<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Centre extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Centre_model');
    }
    public function index()
    {
        $this->load->view('header');
        $this->load->view('Centre/add');
        $this->load->view('footer');
    }

    public function add()
    {
        $this->Centre_model->add();
        redirect('Centre');
    }
}
