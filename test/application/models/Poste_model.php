<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poste_model extends CI_Model
{
    public function get_poste()
    {
        $query = $this->db->get('POSTE');
        return $query->result();
    }

    public function get_poste_by_id($id)
    {
        $this->db->where('ID', $id);
        $query = $this->db->get('POSTE');
        return $query->row();
    }

    public function add_poste()
    {
        $data = array(
            'NAME' => $this->input->post('name'),
            'ISADMIN' => $this->input->post('isadmin')
        );
        $this->db->insert('POSTE', $data);
    }

    public function edit_poste($id)
    {
        $data = array(
            'NAME' => $this->input->post('name'),
            'ISADMIN' => $this->input->post('isadmin')
        );
        $this->db->where('ID', $id);
        $this->db->update('POSTE', $data);
    }

    public function delete_poste($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('POSTE');
    }
}
