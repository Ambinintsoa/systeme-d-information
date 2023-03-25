<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_comptable extends CI_Controller {
  public function __construct() {
    parent::__construct();
    $this->load->model('Plan_comptable_model');
  }
  public function index() {
    $data['comptes'] = $this->Plan_comptable_model->get_pc();
    $this->load->view('plan_comptable/add');
    $this->load->view('plan_comptable/list', $data);
  }

  public function add() {
    if($this->input->post()) {
      $this->Plan_comptable_model->add_pc();
      redirect('Plan_comptable');
    }
    $this->load->view('plan_comptable/add');
  }

  public function edit($id) {
    if($this->input->post()) {
      $this->Plan_comptable_model->edit_pc($id);
      redirect('Plan_comptable');
    }
    $data['compte'] = $this->Plan_comptable_model->get_pc_by_id($id);
    $this->load->view('plan_comptable/edit', $data);
  }

  public function delete($id) {
    $this->Plan_comptable_model->delete_pc($id);
    redirect('Plan_comptable');
  }

}
