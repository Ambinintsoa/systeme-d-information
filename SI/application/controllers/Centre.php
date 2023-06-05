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
        $data['centre']=$this->Centre_model->get_();
        $this->load->view('Centre/add',$data);
        $this->load->view('footer');
    }

    public function add()
    {
        $selectedOptions = $this->input->post('check');
        var_dump($selectedOptions);
        if ($this->input->post('check')==0) {
            $this->Centre_model->add_0();
        }
        if ($this->input->post('check')==1) {
            $this->Centre_model->add_1();
        }
        redirect('Centre');
    }
}
