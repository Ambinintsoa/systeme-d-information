<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_tiers_model extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }

  public function get_tiers() {
    $query = $this->db->get('Plan_tiers');
    return $query->result();
  }

  public function get_tiers_par_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('Plan_tiers');
    return $query->row();
  }

  public function ajouter_tiers() {
    $data = array(
      'Type_tiers' => $this->input->post('type_tiers'),
      'Nom_du_tiers' => $this->input->post('nom_du_tiers'),
      'Autres_informations' => $this->input->post('autres_informations')
    );
    $this->db->insert('Plan_tiers', $data);
  }

  public function modifier_tiers($id) {
    $data = array(
      'Type_tiers' => $this->input->post('type_tiers'),
      'Nom_du_tiers' => $this->input->post('nom_du_tiers'),
      'Autres_informations' => $this->input->post('autres_informations')
    );
    $this->db->where('id', $id);
    $this->db->update('Plan_tiers', $data);
  }

  public function supprimer_tiers($id) {
    $this->db->where('id', $id);
    $this->db->delete('Plan_tiers');
  }
}
