<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{

    public function index()
    {
        $this->load->view('signup');
    }

    public function validate()
    {
        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->Users->addUser($firstname, $lastname, $email, $password);
        redirect('Login');
    }
}
