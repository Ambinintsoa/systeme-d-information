<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administration_model extends CI_Model
{
    public function get_administration()
    {
        $query = $this->db->get('ADMINISTRATION');
        return $query->result();
    }

    public function get_administration_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('ADMINISTRATION');
        return $query->row();
    }

    public function add_administration()
    {
        $data = array(
            'NAME' => $this->input->post('name'),
            'REF' => $this->input->post('ref')
        );
        $this->db->insert('ADMINISTRATION', $data);
    }

    public function edit_administration($id)
    {
        $data = array(
            'NAME' => $this->input->post('name'),
            'REF' => $this->input->post('ref')
        );
        $this->db->where('id', $id);
        $this->db->update('ADMINISTRATION', $data);
    }

    public function delete_administration($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ADMINISTRATION');
    }
}
