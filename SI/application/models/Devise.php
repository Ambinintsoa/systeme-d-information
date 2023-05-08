<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Devise extends CI_Model
{
    public function getAllDevise()
    {
        $query = $this->db->get('devise');
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }
    public function getDeviseById($iddevise)
    {
        $query = $this->db->get_where('devise', array('id' => $iddevise));
        $row = $query->row_array();
        return $row;
    }
}
