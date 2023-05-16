<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produit_model extends CI_Model
{
    public function add() {
        $data = array(
            'nom' => $this->input->post('nom'),
            'unite' => $this->input->post('unite'),
            'prix' => $this->input->post('prix'),
        );
        $this->db->insert('produit', $data);
    }

    public function edit($id)
    {
        $data = array(
            'nom' => $this->input->post('nom'),
            'unite' => $this->input->post('unite'),
            'prix' => $this->input->post('prix'),
        );
        $this->db->where('id', $id);
        $this->db->update('produit', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('produit');
    }

    public function get()
    {
        $query = $this->db->get('produit');
        $response = array();
        foreach( $query->result() as $data){
            $response[] = $data;
        }
        return $response;
    }
}
