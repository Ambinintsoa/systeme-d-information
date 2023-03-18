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
    public function addUser($firstname, $lastname, $email, $pwd)
    {
        $data = array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'password' => $pwd);
        $str = $this->db->insert_string('users', $data);
        $this->db->query($str);
    }
}
