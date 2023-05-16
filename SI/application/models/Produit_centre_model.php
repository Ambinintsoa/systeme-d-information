<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produit_centre_model extends CI_Model
{

    public function get()
    {
        $query = $this->db->get('compte_produit_centre');
        $response = array();
        foreach( $query->result() as $data){
            $response[] = $data;
        }
        return $response;
    }

    public function getprix($v){
        $rep = array();
        $this->load->model('Produit_model');
        $this->load->model('centre_model');
        for ($i=1; $i < count($this->Produit_model->get())+1; $i++) { 
            for ($j=1; $j < count($this->centre_model->get())+1; $j++) { 
                $rep[$i][$j]= doubleval($this->get_by_id($i,$j))/$v;
            }
        }
        return $rep;
    }
    public function sumprod($v){
        $rep = array();
        $this->load->model('Produit_model');
        $this->load->model('centre_model');
        for ($i=1; $i < count($this->Produit_model->get())+1; $i++) { 
                $rep[$i]= $this->getsx($i)/$v;
        }
        return $rep;
    }    

    public function sumcentre($v){
        $rep = array();
        $this->load->model('Produit_model');
        $this->load->model('centre_model');
        for ($i=1; $i < count($this->Produit_model->get())+1; $i++) { 
                $rep[$i]= $this->getsc($i)/$v;
        }
        return $rep;
    }
    public function getsx($x){
        $compte = array();
        $request = "select sum(prixunite) as sum from compte_produit_centre where idproduit=%s";
        $query = $this->db->query(sprintf($request,$x));
        foreach ($query->result() as $row) {
            $compte = $row->sum;
        }
        return $compte;
    }

    public function getsc($x){
        $compte = array();
        $request = "select sum(prixunite) as sum from compte_produit_centre where idcentre=%s";
        $query = $this->db->query(sprintf($request,$x));
        foreach ($query->result() as $row) {
            $compte = $row->sum;
        }
        return $compte;
    }

    public function get_by_id($x,$c)
    {
        $this->db->where('idproduit', $x);
        $this->db->where('idcentre', $c);
        $query = $this->db->get('compte_produit_centre');
        $response = array();
        foreach( $query->result() as $data){
            $response = $data->prixunite;
        }
        return $response;
    }

    

    public function add_pc()
    {
        $num = $this->five($_POST['num_compte']);
        $data = array(
            'num_compte' => $num,
            'nom_compte' => $this->input->post('nom_compte')
        );
        $this->db->insert('plan_comptable', $data);
    }

    public function edit_pc($id)
    {
        $num = $this->five($_POST['num_compte']);
        $data = array(
            'num_compte' => $num,
            'nom_compte' => $this->input->post('nom_compte')
        );
        $this->db->where('id', $id);
        $this->db->update('plan_comptable', $data);
    }

    public function delete_pc($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('plan_comptable');
    }

    function five($num)
    {
        $n = str_split($num);
        echo $n;
        $val = '';
        for ($i = 0; $i < 5; $i++) {
            if ($i < count($n)) {
                $val = $val . $n[$i];
            } else {
                $val = $val . "0";
            }
        }
        return $val;
    }

    public function import_csv()
    {
        $file = fopen($_FILES['file']['tmp_name'], 'r');
        fgets($file);
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $data = array(
                'num_compte' => $column[0],
                'nom_compte' => $column[1]
            );
            $this->db->insert('plan_comptable', $data);
        }

        fclose($file);
    }

    public function getPCByNum($num) {
        $this->db->where('num_compte', $num);
        $query = $this->db->get('plan_comptable');
        return $query->row();
    }

    public function getPCByNom($nom) {
        $this->db->where('nom_compte', $nom);
        $query = $this->db->get('plan_comptable');
        return $query->row();
    }
}
