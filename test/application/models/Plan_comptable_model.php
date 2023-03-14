<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_comptable_model extends CI_Model {

  public function get_comptes() {
    $query = $this->db->get('PLAN_COMPTABLE');
    return $query->result();
  }

  public function get_compte_par_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('PLAN_COMPTABLE');
    return $query->row();
  }

  public function ajouter_compte() {
    $data = array(
      'IDSOCIETY' => $this->input->post('idsociety'),
      'Type_compte' => $this->input->post('type_compte'),
      'NUM_COMPTE' => $this->input->post('numero_compte'),
      'NOM_COMPTE' => $this->input->post('nom_compte')
    );
    $this->db->insert('PLAN_COMPTABLE', $data);
  }

  public function modifier_compte($id) {
    $data = array(
      'IDSOCIETY' => $this->input->post('idsociety'),
      'Type_compte' => $this->input->post('type_compte'),
      'NUM_COMPTE' => $this->input->post('numero_compte'),
      'NOM_COMPTE' => $this->input->post('nom_compte')
    );
    $this->db->where('id', $id);
    $this->db->update('PLAN_COMPTABLE', $data);
  }

  public function supprimer_compte($id) {
    $this->db->where('id', $id);
    $this->db->delete('PLAN_COMPTABLE');
  }
}
