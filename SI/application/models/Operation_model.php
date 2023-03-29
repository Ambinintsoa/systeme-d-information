<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operation_model extends CI_Model
{
    public function get_operation()
    {
        $query = $this->db->get('operation');
        return $query->result();
    }

    public function get_operation_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('operation');
        return $query->row();
    }

    public function add_operation()
    {
        $data = array(
            'COMPTE' => $this->input->post('compte'),
            'TYPE' => $this->input->post('type'),
            'PIECE' => $this->input->post('piece')
        );
        $this->db->insert('operation', $data);
    }

    public function edit_operation($id)
    {
        $data = array(
            'COMPTE' => $this->input->post('compte'),
            'TYPE' => $this->input->post('type'),
            'PIECE' => $this->input->post('piece')
        );
        $this->db->where('id', $id);
        $this->db->update('operation', $data);
    }

    public function delete_operation($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('operation');
    }
}
