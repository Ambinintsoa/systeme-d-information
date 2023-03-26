<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Model
{
    public function getUserByEmailAndPassword($email, $pwd)
    {
        $query = $this->db->get_where('users', array('email' => $email, 'password' => $pwd));
        $row = $query->row_array();
        return $row;
    }
    public function getAllUser()
    {
        $query = $this->db->get_where('users');
        foreach ($query->result_array() as $row) {
            $users[] = $row;
        }
        return $users;
    }
}
