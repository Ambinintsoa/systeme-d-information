<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Balance extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->model('Balance_model');
		$data['code'] = $this->Balance_model->selectAllCode();
		$this->load->view('balance',$data);
	}
	public function code(){
		$this->load->model('Balance_model');
		if($this->Balance_model->selectCode($this->input->post('journal'))!=null){
			$this->session->set_userdata('journal',$this->input->post('journal'));
			echo json_encode(array("status" => "true","message"=>"operation completed successfully"));
		}else{
			echo json_encode(array("status" => "false","message"=>"Please check the code de journal"));
		}
		
	}	
	public function register(){
		$this->load->model('Balance_model');
		if($this->Balance_model->selectByCompte($this->input->get('compte')) == null){
			echo json_encode(array("status" => "false","message"=>"Please check the compte"));
		}
		else if(  $this->input->get('tiers')!="" && $this->Balance_model->selectByTiers($this->input->get('tiers'))==null ){
			echo json_encode(array("status" => "false","message"=>"Please check the compte de tiers"));
		}else{
			
			if($this->session->has_userdata('transaction')  && $this->session->has_userdata('journal')){
				$data=array();
				$data['date'] = $this->input->get('date');
				$data['journal'] =$this->session->userdata('journal');
				$data['compte']= $this->input->get('compte');
				if($this->input->get('tiers')!=""){
					$data['tiers'] = $this->Balance_model->selectByTiers($this->input->get('tiers'));
				}else{
					$data['tiers'] =$this->input->get('tiers');
				}
				$data['tiers'] = $this->input->get('tiers');
				$data['montant'] = $this->input->get('montant');
				$data['situation'] = $this->input->get('situation');
				$tab = $this->session->userdata('transaction');
				$tab[] = $data;
				$this->session->set_userdata('transaction',$tab);
				echo json_encode(array("status" => "true","message"=>"operation completed successfully"));
			}
			
			
		}

	}	
	public function validate(){
		try {
			$this->load->model('Balance_model');
			
			if($this->session->has_userdata('transaction') && $this->session->has_userdata('journal') ){
				$datas = $this->session->userdata('transaction');
				for ($i=0; $i <count( $this->session->userdata('transaction') ); $i++) { 
				 $data = $datas[$i];
				 $this->Balance_model->insert($data);
				 if($data['tiers']!=""){
					$this->Balance_model->insertdetail($data);
				 }
				}
				$this->session->unset_userdata('transaction') ;
				$this->session->unset_userdata('journal') ;
				redirect('balance');
				echo json_encode(array("status" => "true","message"=>"operation completed successfully"));
			}else{
				echo json_encode(array("status" => "false","message"=>"ERROR occurred"));
			}
		} catch (\Throwable $th) {
			echo json_encode(array("status" => "false","message"=>"ERROR occurred"));
		}
    }
	public function delete(){
		$this->session->unset_userdata('transaction');
		$this->session->unset_userdata('journal');
		redirect('balance');
	}
	public function verifcompte(){
		
		$this->load->model('Balance_model');
		if($this->Balance_model->selectByCompte($_POST['compte'])== null) {
			echo json_encode(array("status" => "false"));
		}else{
			echo json_encode(array("status" => "true"));
		}
	}
}
