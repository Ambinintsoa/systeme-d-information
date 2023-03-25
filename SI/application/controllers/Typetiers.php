<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Typetiers extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Type_tiers_model');
      }
    function index(){
        $data['comptes'] = $this->Type_tiers_model->get_tiers();
        $this->load->view('type_tiers/add');
        $this->load->view('type_tiers/list', $data);
    }
    public function add() {
        if($this->input->post()) {
        $this->Type_tiers_model->add_tiers();
        redirect('Typetiers');
        }
        $this->load->view('type_tiers/add');
    }

    public function edit($id) {
        if($this->input->post()) {
        $this->Type_tiers_model->edit_tiers($id);
        redirect('/typetiers');
        }
        $data['compte'] = $this->Type_tiers_model->get_tiers_by_id($id);
        $this->load->view('type_tiers/edit', $data);
    }

    public function delete($id) {
        $this->Type_tiers_model->delete_tiers($id);
        redirect('Typetiers');
    }
}