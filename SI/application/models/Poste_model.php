<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Poste_model extends CI_Model
{
    public function get_poste()
    {
        $query = $this->db->get('poste');
        return $query->result();
    }

    public function get_poste_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('poste');
        return $query->row();
    }

    public function add_poste()
    {
        $data = array(
            'name' => $this->input->post('name'),
            'isadmin' => $this->input->post('isadmin')
        );
        $this->db->insert('poste', $data);
    }

    public function edit_poste($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'isadmin' => $this->input->post('isadmin')
        );
        $this->db->where('id', $id);
        $this->db->update('poste', $data);
    }

    public function delete_poste($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('poste');
    }
}
