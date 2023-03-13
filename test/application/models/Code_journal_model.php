<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code_journal_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get_codes() {
    $query = $this->db->get('Code_journal');
    return $query->result();
  }

  public function get_code_par_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('Code_journal');
    return $query->row();
  }

  public function ajouter_code() {
    $data = array(
      'Type_code' => $this->input->post('type_code'),
      'Code' => $this->input->post('code'),
      'Description_du_code' => $this->input->post('description')
    );
    $this->db->insert('Code_journal', $data);
  }

  public function modifier_code($id) {
    $data = array(
      'Type_code' => $this->input->post('type_code'),
      'Code' => $this->input->post('code'),
      'Description_du_code' => $this->input->post('description')
    );
    $this->db->where('id', $id);
    $this->db->update('Code_journal', $data);
  }

  public function supprimer_code($id) {
    $this->db->where('id', $id);
    $this->db->delete('Code_journal');
  }
}
