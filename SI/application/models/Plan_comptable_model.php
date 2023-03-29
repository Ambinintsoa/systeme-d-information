<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class plan_comptable_model extends CI_Model {

  public function get_pc() {
    $query = $this->db->get('plan_comptable');
    return $query->result();
  }

  public function get_pc_by_id($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('plan_comptable');
    return $query->row();
  }

  public function add_pc() {
    $num = $this->five($_POST['num_compte']);
    $data = array(
      'num_compte' => $num,
      'nom_compte' => $this->input->post('nom_compte')
    );
    $this->db->insert('plan_comptable', $data);
  }

  public function edit_pc($id) {
    $num = $this->five($_POST['num_compte']);
    $data = array(
      'num_compte' => $num,
      'nom_compte' => $this->input->post('nom_compte')
    );
    $this->db->where('id', $id);
    $this->db->update('plan_comptable', $data);
  }

  public function delete_pc($id) {
    $this->db->where('id', $id);
    $this->db->delete('plan_comptable');
  }

  function five($num){
    $n=str_split($num);
    echo $n;
    $val='';
    for ($i=0; $i < 5; $i++) { 
        if($i<count($n)){
            $val=$val.$n[$i];
        }else{
            $val=$val."0";
        }
    }
    return $val;
}


  public function import_csv() {
    $file = fopen($_FILES['file']['tmp_name'], 'r');
    fgets($file);
    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
      $data = array(
        'num_compte' => $column[0],
        'nom_compte' => $column[1]
      );
      $this->db->insert('plan_comptable', $data);
    }
    
    fclose($file);
  }
}
