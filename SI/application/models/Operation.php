<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Operation extends CI_Model
{
    public function getAllInformationAboutTheOperation()
    {
        $compte = array();
        $request = "SELECT o.date, pc.id, pc.num_compte, o.num_operation, pc.nom_compte, o.type, (SUM(o.valeur)) as somme FROM operation o JOIN plan_comptable pc ON pc.id = o.compte GROUP BY pc.id, o.type, o.date, o.num_operation ORDER BY pc.id";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $compte[] = $row;
        }
        return $compte;
    }

    public function sumDebit()
    {
        $request = "SELECT o.idexercice, (SUM(o.valeur)) as somme FROM operation o where o.type = 1 GROUP BY o.idexercice";
        $query = $this->db->query($request);
        $row = $query->row_array();
        return $row;
    }

    public function sumCredit()
    {
        $request = "SELECT o.idexercice, (SUM(o.valeur)) as somme FROM operation o where o.type = 0 GROUP BY o.idexercice";
        $query = $this->db->query($request);
        $row = $query->row_array();
        return $row;
    }

    public function deleteOperation($num)
    {
        $this->db->delete('operation', array('num_operation' => $num));
    }
}
