<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Plan_general_model extends CI_Model
{
    public function get_pg()
    {
        $query = $this->db->get('PLAN_GENERAL');
        return $query->result();
    }

    public function get_pg_by_id($id)
    {
        $this->db->where('ID', $id);
        $query = $this->db->get('PLAN_GENERAL');
        return $query->row();
    }

    public function add_pg()
    {
        $data = array(
            'INTITULE' => $this->input->post('intitule'),
            'DEBUT' => $this->input->post('debut'),
            'FIN' => $this->input->post('fin'),
            'REPORT' => $this->input->post('report'),
            'DEFAULT_TYPE' => $this->input->post('type')
        );
        $this->db->insert('PLAN_GENERAL', $data);
    }

    public function edit_pg($id)
    {
        $data = array(
            'INTITULE' => $this->input->post('intitule'),
            'DEBUT' => $this->input->post('debut'),
            'FIN' => $this->input->post('fin'),
            'REPORT' => $this->input->post('report'),
            'DEFAULT_TYPE' => $this->input->post('type')
        );
        $this->db->where('ID', $id);
        $this->db->update('PLAN_GENERAL', $data);
    }

    public function delete_pg($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('PLAN_GENERAL');
    }
}
