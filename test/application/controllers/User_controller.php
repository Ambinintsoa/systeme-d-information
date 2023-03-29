<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_controller extends CI_Controller
{
    public function index()
    {
        $this->load->view('users/index');
    }

    public function add()
    {
        if ($this->input->post()) {
            $this->usermodel->add_user();
            redirect('');
        }
        $this->load->view('users/create');
    }

    public function edit($id)
    {
        if ($this->input->post()) {
            $this->usermodel->edit_user($id);
            redirect('');
        }
        $data['USERS'] = $this->usermodel->get_user_by_id($id);
        $this->load->view('users/edit', $data);
    }

    public function delete($id)
    {
        $this->usermodel->delete_user($id);
        redirect('');
    }
}
