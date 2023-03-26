<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    public function get_user()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function get_user_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function add_user()
    {
        $data = array(
            'firstname' => $this->input->post('fname'),
            'lastname' => $this->input->post('lname'),
            'email' => $this->input->post('mail'),
            'password' => $this->input->post('pass'),
            'idposte' => $this->input->post('idposte')
        );
        $this->db->insert('users', $data);
    }

    public function edit_user($id)
    {
        $data = array(
            'firstname' => $this->input->post('fname'),
            'lastname' => $this->input->post('lname'),
            'email' => $this->input->post('mail'),
            'password' => $this->input->post('pass'),
            'idposte' => $this->input->post('idposte')
        );
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('users');
    }
}
