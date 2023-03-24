<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compte_tiers extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('compte_tiers_model');
      }
    function index(){
        $data['comptes'] = $this->compte_tiers_model->get_compte();
        $this->load->model('Type_tiers_model');
        $gettype['type'] = $this->Type_tiers_model->get_tiers();
        $this->load->view('compte_tiers/add', $gettype);
        $this->load->view('compte_tiers/list', $data);
    }
    public function add() {
        if($this->input->post()) {
        $this->compte_tiers_model->add_compte();
        redirect('/compte_tiers');
        }
        $this->load->view('compte_tiers/add');
    }

    public function edit($id) {
        if($this->input->post()) {
        $this->compte_tiers_model->edit_compte($id);
        redirect('/compte_tiers');
        }
        $data['compte'] = $this->compte_tiers_model->get_compte_by_id($id);
        $this->load->model('Type_tiers_model');
        $data['type'] = $this->Type_tiers_model->get_tiers();
        $this->load->view('compte_tiers/edit', $data);
    }

    public function delete($id) {
        $this->compte_tiers_model->delete_compte($id);
        redirect('/compte_tiers');
    }
}