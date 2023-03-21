<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Society extends CI_Model
{

    public function getSocietyById($idsociety)
    {
        $query = $this->db->get_where('society', array('id' => $idsociety));
        $row = $query->row_array();
        return $row;
    }
    public function getSocietyByAllInformation($name, $object, $leader, $residence, $address, $tel, $email, $date_creation)
    {
        $query = $this->db->get_where('society', array('name' => $name, 'object' => $object, 'leader' => $leader, 'residence' => $residence, 'address' => $address, 'tel' => $tel, 'email' => $email, 'date_creation' => $date_creation));
        $row = $query->row_array();
        var_dump($row);
        return $row;
    }
    public function getAllSociety()
    {
        $query = $this->db->get_where('society');
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }
    public function addSociety($name, $object, $leader, $residence, $address, $tel, $email, $date_creation)
    {
        $data = array('name' => $name, 'object' => $object, 'leader' => $leader, 'residence' => $residence, 'address' => $address, 'tel' => $tel, 'email' => $email, 'date_creation' => $date_creation);
        $str = $this->db->insert_string('society', $data);
        $this->db->query($str);
    }
}
