<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_comptable extends CI_Controller {

  public function index() {
    $data['comptes'] = $this->pcmodel->get_comptes();
    $this->load->view('plan_comptable/index', $data);
  }

  public function add() {
    if($this->input->post()) {
      $this->pcmodel->ajouter_compte();
      redirect('/plan_comptable');
    }
    $this->load->view('plan_comptable/create');
  }

  public function edit($id) {
    if($this->input->post()) {
      $this->pcmodel->modifier_compte($id);
      redirect('/plan_comptable');
    }
    $data['compte'] = $this->pcmodel->get_compte_par_id($id);
    $this->load->view('plan_comptable/edit', $data);
  }

  public function delete($id) {
    $this->pcmodel->supprimer_compte($id);
    redirect('/plan_comptable');
  }
}
