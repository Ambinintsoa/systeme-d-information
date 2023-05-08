<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analytique extends CI_Controller
{
    public function index()
    {
        $this->load->view('analytique');
    }
}
