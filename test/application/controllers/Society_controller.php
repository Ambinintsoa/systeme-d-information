<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Society_controller extends CI_Controller
{
    public function index()
    {
        $data['society'] = $this->societymodel->get_society();
        $this->load->view('society/index',$data);
    }

    public function add()
    {
        if ($this->input->post()) {
            $this->societymodel->add_society();
            redirect('');
        }
        $this->load->view('society/create');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $this->societymodel->edit_society($id);
            redirect('');
        }
        $data['society'] = $this->societymodel->get_society_by_id($id);
        $this->load->view('society/edit', $data);
    }

    public function delete($id)
    {
        $this->societymodel->delete_society($id);
        redirect('');
    }
}
