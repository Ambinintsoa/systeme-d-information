<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exercice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Exercice_model');
    }
    public function index()
    {
        $this->load->view('header');
        $data['comptes'] = $this->Exercice_model->get_exercice();
        $this->load->view('exercice/add');
        //$this->load->view('exercice/list', $data);
        $this->load->view('footer');
    }

    public function add()
    {
        if ($this->input->post()) {
            $this->Exercice_model->add_exercice();
            redirect('Exercice');
        }
        $this->load->view('exercice/add');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $this->Exercice_model->edit_exercice($id);
            redirect('Exercice');
        }
        $data['compte'] = $this->Exercice_model->get_exercice_by_id($id);
        $this->load->view('exercice/edit', $data);
    }

    public function delete($id)
    {
        $this->Exercice_model->delete_exercice($id);
        redirect('Exercice');
    }
}
