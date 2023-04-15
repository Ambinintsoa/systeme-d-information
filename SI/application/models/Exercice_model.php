<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Exercice_model extends CI_Model
{
    public function get_exercice()
    {
        $query = $this->db->get('exercice');
        return $query->result();
    }

    public function get_exercice_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('exercice');
        return $query->row();
    }

    public function get_last_exercice()
    {
        $this->db->order_by('id','DESC');
        $this->db->limit(1);
        $query = $this->db->get('exercice');
        return $query->result();
    }

    public function add_exercice()
    {
        $data = array(
            'debut' => $this->input->post('debut'),
            'duree' => $this->input->post('duree'),
            'tva' => $this->input->post('tva'),
            'solde' => $this->input->post('solde')
        );
        $this->db->insert('exercice', $data);
    }

    public function edit_exercice($id)
    {
        $data = array(
            'debut' => $this->input->post('debut'),
            'duree' => $this->input->post('duree'),
            'tva' => $this->input->post('tva'),
            'solde' => $this->input->post('solde')
        );
        $this->db->where('id', $id);
        $this->db->update('exercice', $data);
    }

    public function delete_exercice($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('exercice');
    }

    public function check_exercice(){
        $last = $this->get_last_exercice();
        $date = new Datetime($last[0]->debut);
        $date->add(new DateInterval("P{$last[0]->duree}M"));
        $date->format('Y-m-d');
        $x = date('Y-m-d');
        $date_now = new Datetime($x);
        $dfin = $date->getTimestamp();
        $dnow = $date_now->getTimestamp();
        if ($dfin < $dnow) {
            $data = array(
                'debut' => $date_now->format('Y-m-d'),
                'duree' => $last[0]->duree,
                'tva' => $last[0]->tva,
                'solde' => $last[0]->solde
            );
            $this->db->insert('exercice', $data);
        } else if ($dfin > $dnow){
            $this->session->set_userdata('exercice',$last[0]->id);
        }
    }
}


