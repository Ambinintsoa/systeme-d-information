<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exercice extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Exercice_model');
  }
  public function index() {
    //$data['exercice'] = $this->Exercice_model->getDateFin();
    $this->load->view('exercice/index');
  }

  public function add() {
    if($this->input->post()) {
      $this->Exercice_model->add_exercice();
      redirect('Exercice');
    }
    $this->load->view('exercice/add');
  }

  public function edit($id) {
    if($this->input->post()) {
      $this->Exercice_model->edit_exercice($id);
      redirect('Exercice');
    }
    $data['exercice'] = $this->Exercice_model->get_exercice_by_id($id);
    $this->load->view('exercice/edit', $data);
  }

  public function delete($id) {
    $this->Exercice_model->delete_exercice($id);
    redirect('Exercice');
  }

}
