<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_operation_model extends CI_Model
{
    public function get_detoperation()
    {
        $query = $this->db->get('detail_operation');
        return $query->result();
    }

    public function get_detoperation_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('detail_operation');
        return $query->row();
    }

    public function add_detoperation()
    {
        $data = array(
            'IDOPERATION' => $this->input->post('idoperation'),
            'IDTIERS' => $this->input->post('idtiers')
        );
        $this->db->insert('detail_operation', $data);
    }

    public function edit_detoperation($id)
    {
        $data = array(
            'IDOPERATION' => $this->input->post('idoperation'),
            'IDTIERS' => $this->input->post('idtiers')
        );
        $this->db->where('id', $id);
        $this->db->update('detail_operation', $data);
    }

    public function delete_detoperation($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('detail_operation');
    }
}
