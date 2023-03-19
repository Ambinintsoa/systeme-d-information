<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_tiers_model extends CI_Model {

  public function get_tiers() {
    $query = $this->db->get('TYPE_TIERS');
    return $query->result();
  }

  public function get_tiers_by_id($id) {
    $this->db->where('ID', $id);
    $query = $this->db->get('TYPE_TIERS');
    return $query->row();
  }

  public function add_tiers() {
    $data = array(
      'INTITULE' => $this->input->post('intitule')
      'RACINE' => $this->input->post('racine')
    );
    $this->db->insert('TYPE_TIERS', $data);
  }

  public function edit_tiers($id) {
    $data = array(
        'INTITULE' => $this->input->post('intitule')
        'RACINE' => $this->input->post('racine')
      );
    $this->db->where('ID', $id);
    $this->db->update('TYPE_TIERS', $data);
  }

  public function delete_tiers($id) {
    $this->db->where('ID', $id);
    $this->db->delete('TYPE_TIERS');
  }
}
