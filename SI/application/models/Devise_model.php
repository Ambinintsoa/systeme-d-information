<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Devise_model extends CI_Model
{
    public function  selectAllDevices(){
        $res =  $this->db->get('devise');
        $response = array();
        foreach( $res->result() as $data){
            $response[] = $data;
        }
        return $response;
    }
    public function get_spec_devise($data){
        $this->db->where('id',$data);
        return $this->db->get('devise')->row();
    }
}