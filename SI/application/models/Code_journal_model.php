<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code_journal_model extends CI_Model {

  public function get_code() {
    $query = $this->db->get('CODE_DE_JOURNAL');
    return $query->result();
  }

  public function get_code_par_id($id) {
    $this->db->where('ID', $id);
    $query = $this->db->get('CODE_DE_JOURNAL');
    return $query->row();
  }

  public function add_code() {
    $data = array(
      'CODE' => $this->input->post('code'),
      'LIBELLE' => $this->input->post('libelle')
    );
    $this->db->insert('CODE_DE_JOURNAL', $data);
  }

  public function edit_code($id) {
    $data = array(
      'CODE' => $this->input->post('code'),
      'LIBELLE' => $this->input->post('libelle')
    );
    $this->db->where('ID', $id);
    $this->db->update('CODE_DE_JOURNAL', $data);
  }

  public function delete_code($id) {
    $this->db->where('ID', $id);
    $this->db->delete('CODE_DE_JOURNAL');
  }
}
