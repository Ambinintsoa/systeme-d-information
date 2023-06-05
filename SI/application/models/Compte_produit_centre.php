<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Compte_produit_centre extends CI_Model
{
    public function getAllAbout()
    {
        $compte = array();
        $request = "SELECT
        cpc.date, pc.id, pc.num_compte, pc.nom_compte, cpc.quantite, cpc.prixunite, (cpc.quantite*cpc.prixunite) as somme, cpc.idnature, cpc.crnature, cpc.idcentre, cpc.crcentre
        FROM compte_produit_centre cpc
        JOIN plan_comptable pc ON pc.id = cpc.idcompte
        WHERE cpc.date = (SELECT MAX(cpc.date) FROM compte_produit_centre cpc JOIN plan_comptable pc ON pc.id = cpc.idcompte)
        GROUP BY pc.id, cpc.date, cpc.quantite, cpc.prixunite, cpc.idnature, cpc.idcentre, cpc.crnature, cpc.crcentre ORDER BY pc.id";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $compte[] = $row;
        }
        return $compte;
    }

    public function sumAll()
    {
        $somme = 0;
        $request = "SELECT
        cpc.idcompte, (SUM(cpc.quantite*cpc.prixunite*cpc.crcentre/100)*(cpc.crnature/100)) as somme
        FROM compte_produit_centre cpc GROUP BY cpc.idcompte, cpc.crnature";
        $query = $this->db->query($request);
        foreach ($query->result() as $row) {
            $compte[] = $row->somme;
        }
        for ($i = 0; $i < count($compte); $i++) {
            $somme = $compte[$i] + $somme;
        }
        return $somme;
    }

    public function sumFixe()
    {
        $somme = 0;
        $request = "SELECT
        cpc.idcompte, (SUM(cpc.quantite*cpc.prixunite*cpc.crcentre/100)*(cpc.crnature/100)) as somme
        FROM compte_produit_centre cpc
        WHERE cpc.idnature = 1 GROUP BY cpc.idcompte, cpc.crnature";
        $query = $this->db->query($request);
        foreach ($query->result() as $row) {
            $compte[] = $row->somme;
        }
        for ($i = 0; $i < count($compte); $i++) {
            $somme = $compte[$i] + $somme;
        }
        return $somme;
    }

    public function sumVariable()
    {
        $somme = 0;
        $compte=array();
        $request = "SELECT
        cpc.idcompte, (SUM(cpc.quantite*cpc.prixunite*cpc.crcentre/100)*(cpc.crnature/100)) as somme
        FROM compte_produit_centre cpc
        WHERE cpc.idnature = 2 GROUP BY cpc.idcompte, cpc.crnature";
        $query = $this->db->query($request);
        foreach ($query->result() as $row) {
            $compte[] = $row->somme;
        }
        for ($i = 0; $i < count($compte); $i++) {
            $somme = $compte[$i] + $somme;
        }
        return $somme;
    }

    public function fonctionnelle()
    {
        $ans = array();
        $request = "SELECT
        cpc.date, pc.id, pc.num_compte, pc.nom_compte, cpc.quantite, cpc.prixunite, (cpc.quantite*cpc.prixunite) as somme, cpc.idnature, cpc.crnature, cpc.idcentre, cpc.crcentre, (cpc.crcentre) as pourcentage
        FROM compte_produit_centre cpc
        JOIN plan_comptable pc ON pc.id = cpc.idcompte
        WHERE cpc.date = (SELECT MAX(cpc.date) FROM compte_produit_centre cpc JOIN plan_comptable pc ON pc.id = cpc.idcompte)
        GROUP BY pc.id, cpc.date, cpc.quantite, cpc.prixunite, cpc.idnature, cpc.idcentre, cpc.crnature, cpc.crcentre ORDER BY pc.id";
        $query = $this->db->query($request);
        foreach ($query->result_array() as $row) {
            $ans[] = $row;
        }
        return $ans;
    }
}
