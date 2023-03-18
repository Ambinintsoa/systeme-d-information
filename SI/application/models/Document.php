<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Document extends CI_Model
{
    public function getAllDocument()
    {
        $query = $this->db->get_where('document');
        foreach ($query->result_array() as $row) {
            $imglist[] = $row;
        }
        return $imglist;
    }
    public function addDocument($idsociety, $idadministration, $numero, $document)
    {
        $data = array('idsociety' => $idsociety, 'idadministration' => $idadministration, 'numero' => $numero, 'document' => $document);
        $str = $this->db->insert_string('document', $data);
        $this->db->query($str);
    }
}
