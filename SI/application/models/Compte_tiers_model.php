<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class compte_tiers_model extends CI_Model {

  public function get_compte() {
    $query = $this->db->get('compte_tiers');
    return $query->result();
  }

  public function get_compte_by_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('compte_tiers');
    return $query->row();
  }

  public function add_compte($num) {
    $data = array(
      'numero' => $this->input->post('num'),
      'name' => $this->input->post('name'),
      'type_tiers' => $this->input->post('type')
    );
    $this->db->insert('compte_tiers', $data);
  }

  public function edit_compte($id) {
    $data = array(
      'numero' => $this->input->post('num'),
      'name' => $this->input->post('name'),
      'type_tiers' => $this->input->post('type')
    );
    $this->db->where('id', $id);
    $this->db->update('compte_tiers', $data);
  }

  public function delete_compte($id) {
    $this->db->where('id', $id);
    $this->db->delete('compte_tiers');
  }
}