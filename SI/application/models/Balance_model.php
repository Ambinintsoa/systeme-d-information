<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Balance_model extends CI_Model {
    public function insert($data,$init) {
        $val = 0;
        try {
            if($data['init']!=$init){
                $init = $data['init'];
                $val = $this->getInitValue()->nextval;
            }else{
                $val = $this->getInitlastValue()->last_value;
            }
            echo $this->session->userdata('exercice');
            $operations = array(
                'date'=>$data['date'],
                'compte'=> $this->selectByCompte($data['compte'])->id,
                'type'=>$data['situation'],
                'valeur'=>$data['montant'],
                'code'=>$this->session->userdata('journal'),
                'num_operation'=>$val,
                'idexercice'=>$this->session->userdata('exercice')

            );
            $this->db->insert('operation',$operations);
        } catch (Throwable $th) {
            throw $th;
        }
    }
    public function insertdetail($data) {
        try {
            $operations = array(
                'compte'=> $this->selectByCompte($data['compte'])->id,
                'idtiers'=> $this->selectByTiers($data['tiers'])->id,
            );
            $this->db->insert('detail_operation',$operations);
        } catch (Throwable $th) {
            throw $th;
        }
    }
    public function update($data){
        $this->db->where('id',$data['id']);
        $this->db->update('operation',$data);
    }
    public function getInitValue(){
        $obj = array();
        $query = " SELECT nextval('seq_operation'); ";
        $result = $this->db->query(sprintf($query, $idtache));
        return $result->row();
    }
    public function getInitlastValue(){
        $obj = array();
        $query = " SELECT * from seq_operation ";
        $result = $this->db->query(sprintf($query, $idtache));
        return $result->row();
    }
    public function delete($data){
        $this->db->where('id',$data);
        $this->db->delete('operation');
    }
    public function select($data){
        $this->db->where('id',$data);
        return $this->db->get('operation')->row();
    }
    public function selectByCompte($data){
        $this->db->where('num_compte',$data);
        return $this->db->get('plan_comptable')->row();
    }
    public function selectByTiers($data){
        $this->db->where('numero',$data);
        return $this->db->get('compte_tiers')->row();
    }
    public function selectCode($data){
        $this->db->where('id',$data);
        return $this->db->get('code_de_journal')->row();
    }
    public function selectAllCode(){
       $res =  $this->db->get('code_de_journal');
        $response = array();
        foreach( $res->result() as $data){
            $response[] = $data;
        }
        return $response;
    }
}