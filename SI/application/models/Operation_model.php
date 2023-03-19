<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Operation_model extends CI_Model
{
    public function get_operation()
    {
        $query = $this->db->get('OPERATION');
        return $query->result();
    }

    public function get_operation_by_id($id)
    {
        $this->db->where('ID', $id);
        $query = $this->db->get('OPERATION');
        return $query->row();
    }

    public function add_operation()
    {
        $data = array(
            'COMPTE' => $this->input->post('compte'),
            'TYPE' => $this->input->post('type'),
            'PIECE' => $this->input->post('piece')
        );
        $this->db->insert('OPERATION', $data);
    }

    public function edit_operation($id)
    {
        $data = array(
            'COMPTE' => $this->input->post('compte'),
            'TYPE' => $this->input->post('type'),
            'PIECE' => $this->input->post('piece')
        );
        $this->db->where('ID', $id);
        $this->db->update('OPERATION', $data);
    }

    public function delete_operation($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('OPERATION');
    }
}
