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

		$this->load->view('header');
		$this->load->model('Balance_model');
		$this->load->model('Devise_model');
		$data['code'] = $this->Balance_model->selectAllCode();
		$data['devise'] = $this->Devise_model->selectAllDevices();
		$this->load->view('balance',$data);
		$this->load->view('footer');

	}
	public function del($i){
		try{
			$ind =intval($i);
			$tab = $this->session->userdata('transaction');
			array_splice($tab,$ind,1);
			echo json_encode(array("status" => "true","message"=>"operation completed successfully"));
			$this->session->set_userdata('transaction',$tab);
			redirect('Balance');
		}catch (\Throwable $th) {
			echo json_encode(array("status" => "false","message"=>"one error occurded"));
			redirect('Balance'); 
		}
		
	}
	public function code(){
		$this->load->model('Balance_model');
		if($this->Balance_model->selectCode($this->input->post('journal'))!=null){
			$this->session->set_userdata('journal',$this->input->post('journal'));
			echo json_encode(array("status" => "true","message"=>"operation completed successfully"));
		}else{
			echo json_encode(array("status" => "false","message"=>$this->input->post('journal')));
		}
		
	}	
	public function register(){
		$this->load->model('Balance_model');
		$this->load->model('Devise_model');
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
				$data['ref']= $this->input->get('ref');
				if($this->input->get('tiers')!=""){
					$data['tiers'] = $this->Balance_model->selectByTiers($this->input->get('tiers'));
				}else{
					$data['tiers'] =$this->input->get('tiers');
				}
				$data['tiers'] = $this->input->get('tiers');
				$devise =$this->Devise_model->get_spec_devise( $this->input->get('devise'));
				if($devise == null){
					$devise = 1;
				}else{
					$devise = $devise->equivalence;
				}
				$data['montant'] = $this->input->get('montant')*$devise;
				$data['situation'] = $this->input->get('situation');
				$data['init'] = $this->input->get('init');
				$tab = $this->session->userdata('transaction');
				$tab[] = $data;
				$this->session->set_userdata('transaction',$tab);
				echo json_encode(array("status" => "true","message"=>"operation completed successfully","montant"=>$data['montant'],"id"=>count($tab)-1));
			}

			
		}

	}
	public function import_csv()
    {
        $this->load->model('Plan_comptable_model');
        $this->load->model('Code_journal_model');
        $this->load->model('Balance_model');
        
        $file = fopen($_FILES['file']['tmp_name'], 'r');
        fgets($file);
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            if ($column[6] == '' && $column[7] != '') {
                $type = 0;
            } else if ($column[6] != '' && $column[7] == '') {
                $type = 1;
            }

            if ($column[6] == '' && $column[7] != '') {
				$valeur = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $column[7]);
                $valeur = str_replace(',', '.', $valeur);
				echo $valeur;
            } else if ($column[6] != '' && $column[7] == '') {
				$valeur = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $column[6]);
                $valeur = str_replace(',', '.', $valeur);
            }

            $date = str_replace('/', '-', $column[0]);
			echo str_split($column[1], 2)[0];
            date_default_timezone_set('Europe/Moscow');
            $data = array(
                'date' => date('Y-m-d', strtotime($date)),
                'ref' => $column[1],
                'compte' => $column[2],
                'code' => $this->Code_journal_model->getCJByCode(str_split($column[1], 2)[0])->id,
                'situation' => $type,
                'montant' => $valeur,
                'init'=>0,
                'tiers'=>$column[3]
            );
            $this->Balance_model->insert($data, 0);
            if($column[3] != ""){
                
                $this->Balance_model->insertdetail($data);
             }
        }

        fclose($file);
    }
	public function validate(){
		try {
			$this->load->model('Balance_model');
			
			if($this->session->has_userdata('transaction') && $this->session->has_userdata('journal') ){
				$datas = $this->session->userdata('transaction');
				for ($i=0; $i <count( $this->session->userdata('transaction') ); $i++) { 
				 $data = $datas[$i];
				 if($i==0){
					$this->Balance_model->insert($data,-1);
				 }else{
					$this->Balance_model->insert($data,$data['init']);
				 }
				
				 if($data['tiers']!=""){
					$this->Balance_model->insertdetail($data);
				 }
				}
				$this->session->unset_userdata('transaction') ;
				$this->session->unset_userdata('journal') ;
				$this->delete();
				echo json_encode(array("status" => "true","message"=>"operation completed successfully"));
			}else{
				echo json_encode(array("status" => "false","message"=>"ERROR occurred"));
			}
			redirect('balance');
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
