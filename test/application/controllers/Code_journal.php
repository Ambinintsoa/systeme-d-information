<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code_journal extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('Code_journal_model');
    $this->load->helper('url');
  }

  public function index() {
    $data['codes'] = $this->Code_journal_model->get_codes();
    $this->load->view('code_journal/liste', $data);
  }

  public function ajouter() {
    if($this->input->post('submit')) {
      $this->Code_journal_model->ajouter_code();
      redirect('/code_journal');
    }
    $this->load->view('code_journal/formulaire');
  }

  public function modifier($id) {
    if($this->input->post('submit')) {
      $this->Code_journal_model->modifier_code($id);
      redirect('/code_journal');
    }
    $data['code'] = $this->Code_journal_model->get_code_par_id($id);
    $this->load->view('code_journal/formulaire', $data);
  }

  public function supprimer($id) {
    $this->Code_journal_model->supprimer_code($id);
    redirect('/code_journal');
  }
}
