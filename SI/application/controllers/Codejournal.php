<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Codejournal extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Code_journal_model');
      }
    
      public function index() {
        $this->load->view('header');
        $data['codes'] = $this->Code_journal_model->get_code();
        $this->load->view('code_de_journal/add');
        $this->load->view('code_de_journal/list', $data);
        $this->load->view('footer');
      }
    
      public function add() {
        if($this->input->post()) {
          $this->Code_journal_model->add_code();
          redirect('Codejournal');
        }
        $this->load->view('code_de_journal/add');
      }
    
      public function edit($id) {
        if($this->input->post()) {
          $this->Code_journal_model->edit_code($id);
          redirect('Codejournal');
        }
        $data['code'] = $this->Code_journal_model->get_code_par_id($id);
        $this->load->view('code_de_journal/edit', $data);
      }
    
      public function delete($id) {
        $this->Code_journal_model->delete_code($id);
        redirect('Codejournal');
      }
}