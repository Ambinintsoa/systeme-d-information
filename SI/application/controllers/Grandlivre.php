<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Grandlivre extends CI_Controller
{    
    public function index()
    {
        $this->load->view('header');
        $devise['devise'] = $this->Devise->getDeviseById($this->input->get('devise'));
        $alldevise['alldevise'] = $this->Devise->getAllDevise();
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
        $this->load->view('grandlivre', $data);
        $this->load->view('footer');
    }


    public function delete($num)
    {
        $this->Operation->deleteOperation($num);
        redirect('Grandlivre?devise=1');
    }
}
