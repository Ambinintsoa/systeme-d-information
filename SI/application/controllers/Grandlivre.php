<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grandlivre extends CI_Controller
{

    public function index()
    {
        $this->load->view('header');
        $operation['operation'] = $this->Operation->getAllInformationAboutTheOperation();
        $this->load->view('grandlivre', $operation);
        $this->load->view('footer');
    }
}
