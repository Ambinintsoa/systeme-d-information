<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Centre_model extends CI_Model
{
    public function add() {
        $data = array(
            'nom' => $this->input->post('nom')
        );
        $this->db->insert('centre', $data);
    }

    public function edit($id)
    {
        $data = array(
            'nom' => $this->input->post('nom')
        );
        $this->db->where('id', $id);
        $this->db->update('centre', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('centre');
    }
    public function get()
    {
        $query = $this->db->get('centre');
        return $query->result();
    }
}
