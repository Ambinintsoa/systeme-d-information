<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document_model extends CI_Model
{
    public function get_Document()
    {
        $query = $this->db->get('DOCUMENT');
        return $query->result();
    }

    public function get_Document_by_id($id)
    {
        $this->db->where('ID', $id);
        $query = $this->db->get('DOCUMENT');
        return $query->row();
    }

    public function add_Document()
    {
        $data = array(
            'IDADMINISTRATION' => $this->input->post('idadmin'),
            'NUMERO' => $this->input->post('numero'),
            'DOCUMENT' => $this->input->post('document')
        );
        $this->db->insert('DOCUMENT', $data);
    }

    public function edit_Document($id)
    {
        $data = array(
            'IDADMINISTRATION' => $this->input->post('idadmin'),
            'NUMERO' => $this->input->post('numero'),
            'DOCUMENT' => $this->input->post('document')
        );
        $this->db->where('ID', $id);
        $this->db->update('DOCUMENT', $data);
    }

    public function delete_Document($id)
    {
        $this->db->where('ID', $id);
        $this->db->delete('DOCUMENT');
    }
}
