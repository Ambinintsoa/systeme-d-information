<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comptable extends CI_Model
{

    public function getComptableByIdsociety($idsociety)
    {
        $query = $this->db->get_where('plan_comptable', array('idsociety' => $idsociety));
        $row = $query->row_array();
        return $row;
    }
    public function addComptable($idsociety, $num_compte, $nom_compte)
    {
        $data = array('idsociety' => $idsociety, 'num_compte' => $num_compte, 'nom_compte' => $nom_compte);
        $str = $this->db->insert_string('plan_comptable', $data);
        $this->db->query($str);
    }
}
