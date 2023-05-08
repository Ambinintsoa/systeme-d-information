<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Balance1 extends CI_Controller
{
    public function index()
    {
        $this->load->view('header');
        $alldevise['alldevise'] = $this->Devise->getAllDevise();
        $devise['devise'] = $this->Devise->getDeviseById($this->input->get('devise'));
        if ($this->Operation->getAllInformationAboutTheOperation() != null) {
            $operation['operation'] = $this->Operation->getAllInformationAboutTheOperation();
        } else {
            $operation['operation'] = array();
        }

        $data = [
            'devise'=> $devise,
            'operation'=>$operation,
            'alldevise'=>$alldevise
        ];
        $this->load->view('balance1', $data);
        $this->load->view('footer');
    }
}
