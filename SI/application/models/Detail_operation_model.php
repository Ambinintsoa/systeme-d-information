<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_operation_model extends CI_Model
{
    public function get_detoperation()
    {
        $query = $this->db->get('DETAIL_OPERATION');
        return $query->result();
    }

    public function get_detoperation_by_id($id)
    {
        $this->db->where('ID', $id);
        $query = $this->db->get('DETAIL_OPERATION');
        return $query->row();
    }

    public function add_detoperation()
    {
        $data = array(
            'IDOPERATION' => $this->input->post('idoperation'),
            'IDTIERS' => $this->input->post('idtiers')
        );
        $this->db->insert('DETAIL_OPERATION', $data);
    }

    public function edit_detoperation($id)
    {
        $data = array(
            'IDOPERATION' => $this->input->post('idoperation'),
            'IDTIERS' => $this->input->post('idtiers')
        );
        $this->db->where('ID', $id);
        $this->db->update('DETAIL_OPERATION', $data);
    }

    public function delete_detoperation($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('DETAIL_OPERATION');
    }
}
