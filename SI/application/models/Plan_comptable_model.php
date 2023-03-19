<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_comptable_model extends CI_Model {

  public function get_pc() {
    $query = $this->db->get('PLAN_COMPTABLE');
    return $query->result();
  }

  public function get_pc_par_id($id) {
    $this->db->where('ID', $id);
    $query = $this->db->get('PLAN_COMPTABLE');
    return $query->row();
  }

  public function add_pc() {
    $data = array(
      'NUM_COMPTE' => $this->input->post('num_compte'),
      'NOM_COMPTE' => $this->input->post('nom_compte')
    );
    $this->db->insert('PLAN_COMPTABLE', $data);
  }

  public function edit_pc($num) {
    $data = array(
      'NUM_COMPTE' => $this->input->post('num_compte'),
      'NOM_COMPTE' => $this->input->post('nom_compte')
    );
    $this->db->where('ID', $this->input->post('id'));
    $this->db->update('PLAN_COMPTABLE', $data);
  }

  public function delet_pc($id) {
    $this->db->where('ID', $id);
    $this->db->delete('PLAN_COMPTABLE');
  }

  public function import_csv() {
    if (isset($_POST["import"])) {
      $fileName = $_FILES["file"]["tmp_name"];
      if ($_FILES["file"]["size"] > 0) { 
        $file = fopen($fileName, "r");
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
          $data = array(
            'NUM_COMPTE' => $column[0],
            'NOM_COMPTE' => $column[1]
          );
          $this->db->insert('PLAN_COMPTABLE', $data);
        }
      }
    }
  }
}
