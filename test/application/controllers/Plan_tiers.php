<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan_tiers extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Plan_tiers_model');
    $this->load->helper('url');
  }

  public function index() {
    $data['tiers'] = $this->Plan_tiers_model->get_tiers();
    $this->load->view('plan_tiers/liste', $data);
  }

  public function ajouter() {
    if($this->input->post('submit')) {
      $this->Plan_tiers_model->ajouter_tiers();
      redirect('/plan_tiers');
    }
    $this->load->view('plan_tiers/formulaire');
  }

  public function modifier($id) {
    if($this->input->post('submit')) {
      $this->Plan_tiers_model->modifier_tiers($id);
      redirect('/plan_tiers');
    }
    $data['tiers'] = $this->Plan_tiers_model->get_tiers_par_id($id);
    $this->load->view('plan_tiers/formulaire', $data);
  }

  public function supprimer($id) {
    $this->Plan_tiers_model->supprimer_tiers($id);
    redirect('/plan_tiers');
  }
}
