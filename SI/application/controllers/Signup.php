<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
      }
    
      public function index() {
        $this->load->view('signup.php');
      }
    
      public function add() {
        if($this->input->post()) {
          $this->Users_model->add_user();
          redirect('Login');
        }
      }
}
