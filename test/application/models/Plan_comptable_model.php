<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_comptable_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get_comptes() {
    $query = $this->db->get('comptes');
    return $query->result();
  }

  public function get_compte_par_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('comptes');
    return $query->row();
  }

  public function ajouter_compte() {
    $data = array(
      'Type_compte' => $this->input->post('type_compte'),
      'Numero_compte' => $this->input->post('numero_compte'),
      'Nom_compte' => $this->input->post('nom_compte')
    );
    $this->db->insert('comptes', $data);
  }

  public function modifier_compte($id) {
    $data = array(
      'Type_compte' => $this->input->post('type_compte'),
      'Numero_compte' => $this->input->post('numero_compte'),
      'Nom_compte' => $this->input->post('nom_compte')
    );
    $this->db->where('id', $id);
    $this->db->update('comptes', $data);
  }

  public function supprimer_compte($id) {
    $this->db->where('id', $id);
    $this->db->delete('comptes');
  }
}
