<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document_model extends CI_Model
{
    public function get_document()
    {
        $query = $this->db->get('document');
        return $query->result();
    }

    public function get_document_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('document');
        return $query->row();
    }

    public function add_document()
    {
        $data = array(
            'idadministration' => $this->input->post('idadmin'),
            'NUMERO' => $this->input->post('numero'),
            'document' => $this->input->post('document')
        );
        $this->db->insert('document', $data);
    }

    public function edit_document($id)
    {
        $data = array(
            'idadministration' => $this->input->post('idadmin'),
            'NUMERO' => $this->input->post('numero'),
            'document' => $this->input->post('document')
        );
        $this->db->where('id', $id);
        $this->db->update('document', $data);
    }

    public function delete_document($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('document');
    }
}
