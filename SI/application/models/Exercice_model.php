<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exercice_model extends CI_Model
{
    public function get_exercice()
    {
        $query = $this->db->get('EXERCICE');
        return $query->result();
    }

    public function get_exercice_by_id($id)
    {
        $this->db->where('ID', $id);
        $query = $this->db->get('EXERCICE');
        return $query->row();
    }

    public function add_exercice()
    {
        $data = array(
            'DEBUT' => $this->input->post('debut'),
            'DUREE' => $this->input->post('duree'),
            'TVA' => $this->input->post('tva'),
            'SOLDE' => $this->input->post('solde')
        );
        $this->db->insert('EXERCICE', $data);
    }

    public function edit_exercice($id)
    {
        $data = array(
            'DEBUT' => $this->input->post('debut'),
            'DUREE' => $this->input->post('duree'),
            'TVA' => $this->input->post('tva'),
            'SOLDE' => $this->input->post('solde')
        );
        $this->db->where('ID', $id);
        $this->db->update('EXERCICE', $data);
    }

    public function delete_exercice($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('EXERCICE');
    }
}
