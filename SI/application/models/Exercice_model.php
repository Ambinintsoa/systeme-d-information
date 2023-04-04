<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exercice_model extends CI_Model
{
    public function get_exercice()
    {
        $query = $this->db->get('exercice');
        return $query->result();
    }

    public function get_exercice_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('exercice');
        return $query->row();
    }

    public function add_exercice()
    {
        $data = array(
            'debut' => $this->input->post('debut'),
            'duree' => $this->input->post('duree'),
            'tva' => $this->input->post('tva'),
            'solde' => $this->input->post('solde')
        );
        $this->db->insert('exercice', $data);
    }

    public function edit_exercice($id)
    {
        $data = array(
            'debut' => $this->input->post('debut'),
            'duree' => $this->input->post('duree'),
            'tva' => $this->input->post('tva'),
            'solde' => $this->input->post('solde')
        );
        $this->db->where('id', $id);
        $this->db->update('exercice', $data);
    }

    public function delete_exercice($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('exercice');
    }

    public function get_last_exercice()
    {
        $max = $this->db->select_max('id');
        $this->db->where('id', $max);
        $query = $this->db->get('exercice');
        return $query->row();
    }
}
