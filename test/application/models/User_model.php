<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_user()
    {
        $query = $this->db->get('USERS');
        return $query->result();
    }

    public function get_user_by_id($id)
    {
        $this->db->where('ID', $id);
        $query = $this->db->get('USERS');
        return $query->row();
    }

    public function add_user()
    {
        $data = array(
            'FIRSTNAME' => $this->input->post('fname'),
            'LASTNAME' => $this->input->post('lname'),
            'EMAIL' => $this->input->post('mail'),
            'PASSWORD' => $this->input->post('pass'),
            'IDPOSTE' => $this->input->post('idpost'),
            'IDSOCIETY' => $this->input->post('idsociety')
        );
        $this->db->insert('USERS', $data);
    }

    public function edit_user($id)
    {
        $data = array(
            'FIRSTNAME' => $this->input->post('fname'),
            'LASTNAME' => $this->input->post('lname'),
            'EMAIL' => $this->input->post('mail'),
            'PASSWORD' => $this->input->post('pass'),
            'IDPOSTE' => $this->input->post('idpost'),
            'IDSOCIETY' => $this->input->post('idsociety')
        );
        $this->db->where('ID', $id);
        $this->db->update('USERS', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('USERS');
    }
}
