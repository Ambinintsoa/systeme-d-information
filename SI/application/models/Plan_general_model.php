<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plan_general_model extends CI_Model
{
    public function get_pg()
    {
        $query = $this->db->get('plan_general');
        return $query->result();
    }

    public function get_pg_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('plan_general');
        return $query->row();
    }

    public function add_pg()
    {
        $data = array(
            'intitule' => $this->input->post('intitule'),
            'debut' => $this->input->post('debut'),
            'fin' => $this->input->post('fin'),
            'report' => $this->input->post('report'),
            'default_type' => $this->input->post('type')
        );
        $this->db->insert('plan_general', $data);
    }

    public function edit_pg($id)
    {
        $data = array(
            'intitule' => $this->input->post('intitule'),
            'debut' => $this->input->post('debut'),
            'fin' => $this->input->post('fin'),
            'report' => $this->input->post('report'),
            'default_type' => $this->input->post('type')
        );
        $this->db->where('id', $id);
        $this->db->update('plan_general', $data);
    }

    public function delete_pg($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('plan_general');
    }
}
