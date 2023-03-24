<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function index()
    {
        $this->load->view('login');
    }

    public function check()
	{
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		$login = $this->Users->getUserByEmailAndPassword($email,$pass);

		if ($login==null) {
			redirect('Login');
		} else {
			$this->session->set_userdata('iduser',$login['id']);
			redirect('Balance');
		}
	}
}
