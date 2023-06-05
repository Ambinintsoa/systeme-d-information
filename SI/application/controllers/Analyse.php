<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analyse extends CI_Controller
{
    public function index()
    {
        $this->load->view('analyse/index');
    }
    public function insert (){
        
        $this->session->set_userdata('analyses',array());
        if($this->session->has_userdata('analyses')== false){
            $this->session->set_userdata('analyses',array());
        }
         $tab =  $this->session->get_userdata('analyses');
         $t= json_decode($_POST['info']);
        //  var_dump($t);
        //  var_dump($tab);
        if(count($t) !=0){
            for ($i=0; $i < count($t); $i++) { 
                $tab['analyses'][] = $t[$i];
            }
            $this->session->set_userdata('analyses',$tab);
        }
        // var_dump($this->session->get_userdata('analyses'));
        echo json_encode(array("status" => "true","message"=>"operation completed successfully"));
    }
}