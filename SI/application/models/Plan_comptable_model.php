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


function importExcelToDatabase($file_path) {
  // Ouvrir le fichier Excel
  $objPHPExcel = PHPExcel_IOFactory::load($file_path);

  // Récupérer la première feuille de calcul
  $worksheet = $objPHPExcel->getActiveSheet();

  // Récupérer les données de la feuille de calcul sous forme de tableau
  $data = $worksheet->toArray(null, true, true, true);

  // Connexion à la base de données
  $CI =& get_instance();
  $CI->load->database();

  // Boucle sur les lignes du tableau de données
  foreach ($data as $row) {
    // Insérer les données dans la table de la base de données
    $CI->db->insert('plan_comptable', $row);
  }
}
  public function import_csv() {
    if (isset($_POST["import"])) {
      $fileName = $_FILES["file"]["tmp_name"];
      if ($_FILES["file"]["size"] > 0) { 
        $file = fopen($fileName, "r");
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
          $data = array(
            'num_compte' => $column[0],
            'nom_compte' => $column[1]
          );
          $this->db->insert('plan_comptable', $data);
        }
      }
    }
  }
}
