<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Society_controller extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Society_model');
      }

    public function index()
    {
        $data['society'] = $this->Society_model->get_society();
        $this->load->view('society/info',$data);
    }

    public function add()
    {
        if ($this->input->post()) {
            $this->Society_model->add_society();
            redirect('');
        }
        $this->load->view('society/add');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $this->Society_model->edit_society($id);
            redirect('');
        }
        $data['society'] = $this->Society_model->get_society_by_id($id);
        $this->load->view('society/edit', $data);
    }

    public function delete($id)
    {
        $this->Society_model->delete_society($id);
        redirect('');
    }
}
