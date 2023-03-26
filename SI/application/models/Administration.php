<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administration extends CI_Model
{

    public function getAdminitstrationById($idadministration)
    {
        $query = $this->db->get_where('administration', array('id' => $idadministration));
        $row = $query->row_array();
        return $row;
    }
    public function getAllAdministration()
    {
        $query = $this->db->get_where('administration');
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }
}