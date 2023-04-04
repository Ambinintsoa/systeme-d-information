<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Balance1 extends CI_Controller
{

    public function index()
    {
        $this->load->view('header');
        if ($this->Operation->getAllInformationAboutTheOperation() != null) {
            $operation['operation'] = $this->Operation->getAllInformationAboutTheOperation();
        } else {
            $operation['operation'] = [];
        }
        $this->load->view('balance1', $operation);
        $this->load->view('footer');
    }
}
