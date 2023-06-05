<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Analyse_model extends CI_Model
{
    public function getAllCentre(){
        $res =  $this->db->get('centre');
        $response = array();
        foreach( $res->result() as $data){
            $response[] = $data;
        }
        return $response;
    }
    public function getAllProduit(){
        $res =  $this->db->get('produit');
        $response = array();
        foreach( $res->result() as $data){
            $response[] = $data;
        }
        return $response;
    }
    public function getAllNature(){
        $res =  $this->db->get('nature');
        $response = array();
        foreach( $res->result() as $data){
            $response[] = $data;
        }
        return $response;
    }
    public function set_compte($datas){
        foreach( $datas as $data){
            $dat =array(
                'IDCOMPTE' => intval( $data->compte),
                 'IDPRODUIT' => $data->produit_id,
                 'crproduit' => $data->produit,
                 'IDCENTRE' => $data->centre_id,
                 'crcentre' => $data->center,
                 'PRIXUNITE' => $data->pu,
                 'QUANTITE' => $data->qte,
                 'IDNATURE' => intval($data->id_nature),
                 'crnature' => $data->nature,
             );
     
             $req ='INSERT INTO COMPTE_PRODUIT_CENTRE (IDCOMPTE, IDPRODUIT, crproduit, IDCENTRE, crcentre, PRIXUNITE, QUANTITE, IDNATURE, crnature) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)';
             
             $result = $this->db->query(sprintf($req,intval( $data->compte),$data->produit_id,$data->produit,$data->centre_id,$data->center,$data->pu,$data->qte,intval($data->id_nature),$data->nature));
     
        }

    }

}
