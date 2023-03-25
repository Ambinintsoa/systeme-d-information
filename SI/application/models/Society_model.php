<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Society_model extends CI_Model
{
    public function get_society()
    {
        $query = $this->db->get('society');
        return $query->result();
    }

    public function get_society_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('society');
        return $query->row();
    }
    
    public function edit_society($id)
    {
        $data = array(
            'name' => $this->input->post('name'),
            'object' => $this->input->post('object'),
            'leader' => $this->input->post('leader'),
            'residence' => $this->input->post('residence'),
            'adress' => $this->input->post('adresse'),
            'tel' => $this->input->post('tel'),
            'email' => $this->input->post('email'),
            'date_creation' => $this->input->post('date')
        );
        $this->db->where('id', $id);
        $this->db->update('society', $data);
    }

    public function delete_society($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('society');
    }
}
