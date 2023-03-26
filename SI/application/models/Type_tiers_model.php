<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type_tiers_model extends CI_Model {

  public function get_tiers() {
    $query = $this->db->get('type_tiers');
    return $query->result();
  }

  public function get_tiers_by_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('type_tiers');
    return $query->row();
  }

  public function add_tiers() {
    $data = array(
      'intitule' => $this->input->post('intitule'),
      'racine' => $this->input->post('racine')
    );
    $this->db->insert('type_tiers', $data);
  }

  public function edit_tiers($id) {
    $data = array(
      'intitule' => $this->input->post('intitule'),
      'racine' => $this->input->post('racine')
    );
    $this->db->where('id', $id);
    $this->db->update('type_tiers', $data);
  }

  public function delete_tiers($id) {
    $this->db->where('id', $id);
    $this->db->delete('type_tiers');
  }
}
