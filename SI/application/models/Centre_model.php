<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Centre_model extends CI_Model
{
    public function add_1() {
        $data = array(
            'nom' => $this->input->post('nom'),    
            'isfonction' => 1          
        );
        $this->db->insert('centre', $data);
    }
    public function add_0() {
        $data = array(
            'nom' => $this->input->post('nom'),
            'isfonction' => 0
        );
        $this->db->insert('centre', $data);
        $lastInsertId = $this->db->insert_id();
        $c = $this->get_();
        foreach($c as $center) { 
            echo $this->input->post($center->nom);
            $data1 = array(
                'idcentrestruct' => $lastInsertId,
                'idcentrefonct' => $center->id,
                'pourcentage' => $this->input->post($center->nom)
            );
            $this->db->insert('structure_fonction', $data1);
        }
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

    public function get_()
    {
        $this->db->where('isfonction', 1);
        $query = $this->db->get('centre');
        return $query->result();
    }

    public function insert_struct_fonct(){
        $data = array(
            'idcentrestruct' => $this->input->post('idStuct'),
            'idcentrefonct' => $this->input->post('idFonct'),
            'pourcentage' => $this->input->post('idFonct')
        );
        $this->db->insert('structure_fonction', $data);
    }
}
