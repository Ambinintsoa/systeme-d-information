<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->load->model('Users_model');
	  }

    public function index()
    {
        $this->load->view('login');
    }

    public function check()
	{
		$email = $this->input->post('email');
		$pass = $this->input->post('password');
		$login = $this->Users_model->check($email,$pass);

		if ($login==null) {
			redirect('Login');
		} else {
			$this->session->set_userdata('iduser',$login->id);
			$this->load->model('Exercice_model');
			$this->Exercice_model->check_exercice();	
			redirect('balance');
		}
	}

	public function logout() {
		$this->session->unset_userdata('iduser');
		redirect('');
	}
}
