<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Society_model extends CI_Model
{
    public function get_society()
    {
        $query = $this->db->get('SOCIETY');
        return $query->result();
    }

    public function get_society_by_id($id)
    {
        $this->db->where('ID', $id);
        $query = $this->db->get('SOCIETY');
        return $query->row();
    }

    public function add_society()
    {
        $data = array(
            'NAME' => $this->input->post('name'),
            'OBJECT' => $this->input->post('object'),
            'LEADER' => $this->input->post('leader'),
            'RESIDENCE' => $this->input->post('residence'),
            'ADRESS' => $this->input->post('adresse'),
            'TEL' => $this->input->post('tel'),
            'EMAIL' => $this->input->post('email'),
            'DATE_CREATION' => $this->input->post('date')
        );
        $this->db->insert('SOCIETY', $data);
    }

    public function edit_society($id)
    {
        $data = array(
            'NAME' => $this->input->post('name'),
            'OBJECT' => $this->input->post('object'),
            'LEADER' => $this->input->post('leader'),
            'RESIDENCE' => $this->input->post('residence'),
            'ADRESS' => $this->input->post('adresse'),
            'TEL' => $this->input->post('tel'),
            'EMAIL' => $this->input->post('email'),
            'DATE_CREATION' => $this->input->post('date')
        );
        $this->db->where('ID', $id);
        $this->db->update('SOCIETY', $data);
    }

    public function delete_society($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('SOCIETY');
    }
}
