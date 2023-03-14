<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administration_model extends CI_Model
{
    public function get_Administration()
    {
        $query = $this->db->get('ADIMINISTRATION');
        return $query->result();
    }

    public function get_Administration_by_id($id)
    {
        $this->db->where('ID', $id);
        $query = $this->db->get('ADIMINISTRATION');
        return $query->row();
    }

    public function add_Administration()
    {
        $data = array(
            'NAME' => $this->input->post('name'),
            'REF' => $this->input->post('ref')
        );
        $this->db->insert('ADIMINISTRATION', $data);
    }

    public function edit_Administration($id)
    {
        $data = array(
            'NAME' => $this->input->post('name'),
            'REF' => $this->input->post('ref')
        );
        $this->db->where('ID', $id);
        $this->db->update('ADIMINISTRATION', $data);
    }

    public function delete_Administration($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('ADIMINISTRATION');
    }
}
