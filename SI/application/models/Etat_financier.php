<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Etat_financier extends CI_Model
{
    public function get_valeur_brut($debut,$fin,$exercice){
        $request = "select coalesce(sum(valeur),0) from operation where type = 1 and idexercice = %s and compte >= %s and compte < %s";
        $query = $this->db->query(sprintf($request, $exercice,$debut,$fin));
        $debit = $query->row();
        $request = "select coalesce(sum(valeur),0) from operation where type = 0 and idexercice = %s and compte >= %s and compte < %s";
        $query = $this->db->query(sprintf($request, $exercice,$debut,$fin));
        $credit = $query->row();
        return $debit->coalesce - $credit->coalesce;
    }
    public function get_valeur_amort($debut,$exercice){
        $request = "select coalesce(sum(valeur),0) from operation where type = 1 and idexercice = %s and compte = %s";
        $query = $this->db->query(sprintf($request, $exercice,$debut));
        $debit = $query->row();
        $request = "select coalesce(sum(valeur),0) from operation where type = 0 and idexercice = %s and compte = %s";
        $query = $this->db->query(sprintf($request, $exercice,$debut));
        $credit = $query->row();
        return $debit->coalesce - $credit->coalesce;
    }
}