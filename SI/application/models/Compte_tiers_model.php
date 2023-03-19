<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte_tiers_model extends CI_Model {

  public function get_comptes($id) {
    $obj = array();
    $query = "select * from compte_tiers  where idsociety = %s ";
    $result = $this->db->query(sprintf($query, $id));
    foreach ($result->result_array() as $row) {
        array_push($obj, $row);
    }
    return $obj;
  }

  public function get_compte_par_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('COMPTE_TIERS');
    return $query->row();
  }

  public function ajouter_compte($num) {
    $data = array(
      'IDSOCIETY' => $this->input->post('idsociety'),
      'NAME' => $this->input->post('name'),
      'COMPTE' => $this->input->post('compte')
    );
    $this->db->insert('COMPTE_TIERS', $data);
  }

  public function modifier_compte() {
    $data = array(
        'IDSOCIETY' => $this->input->post('idsociety'),
        'NAME' => $this->input->post('name'),
        'COMPTE' => $this->input->post('compte')
    );
    $this->db->where('id', $this->input->post('id'));
    $this->db->update('COMPTE_TIERS', $data);
  }

  public function supprimer_compte($id) {
    $this->db->where('id', $id);
    $this->db->delete('COMPTE_TIERS');
  }
}