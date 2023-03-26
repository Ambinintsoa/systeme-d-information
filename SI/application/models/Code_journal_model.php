<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code_journal_model extends CI_Model {

  public function get_code() {
    $query = $this->db->get('code_de_journal');
    return $query->result();
  }

  public function get_code_par_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('code_de_journal');
    return $query->row();
  }

  public function add_code() {
    $data = array(
      'code' => $this->input->post('code'),
      'libelle' => $this->input->post('libelle')
    );
    $this->db->insert('code_de_journal', $data);
  }

  public function edit_code($id) {
    $data = array(
      'code' => $this->input->post('code'),
      'libelle' => $this->input->post('libelle')
    );
    $this->db->where('id', $id);
    $this->db->update('code_de_journal', $data);
  }

  public function delete_code($id) {
    $this->db->where('id', $id);
    $this->db->delete('code_de_journal');
  }
}
