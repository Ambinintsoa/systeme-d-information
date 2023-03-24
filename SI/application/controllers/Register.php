<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
    
    public function validate()
    {
        $config1['file_name']   = $_FILES['filenif']['name'];
        $config1['upload_path']   = './assets/img/';
        $config1['allowed_types'] = 'gif|jpg|png|jpeg';
        $config1['max_size']      = 10000;
        $config1['max_width']     = 10000;
        $config1['max_height']    = 10000;
        $id1 = $this->input->post('doc1');
        $numero1 = $this->input->post('numnif');

        $config2['file_name']   = $_FILES['filenrcs']['name'];
        $config2['upload_path']   = './assets/img/';
        $config2['allowed_types'] = 'gif|jpg|png|jpeg';
        $config2['max_size']      = 10000;
        $config2['max_width']     = 10000;
        $config2['max_height']    = 10000;
        $id2 = $this->input->post('doc2');
        $numero2 = $this->input->post('numnrcs');

        $config3['file_name']   = $_FILES['filens']['name'];
        $config3['upload_path']   = './assets/img/';
        $config3['allowed_types'] = 'gif|jpg|png|jpeg';
        $config3['max_size']      = 10000;
        $config3['max_width']     = 10000;
        $config3['max_height']    = 10000;
        $id3 = $this->input->post('doc3');
        $numero3 = $this->input->post('numns');

        $name = $this->input->post('name');
        $object = $this->input->post('object');
        $leader = $this->input->post('leader');
        $residence = $this->input->post('residence');
        $address = $this->input->post('address');
        $tel = $this->input->post('tel');
        $email = $this->input->post('email');
        $date_creation = $this->input->post('datecreation');

        $this->load->library('upload', $config1);
        $this->load->library('upload', $config2);
        $this->load->library('upload', $config3);

        if ($this->upload->do_upload('filenif') && $this->upload->do_upload('filenrcs') && $this->upload->do_upload('filens')) {
            $path1 = $config1['upload_path'] . $config1['file_name'];
            $path2 = $config2['upload_path'] . $config2['file_name'];
            $path3 = $config3['upload_path'] . $config3['file_name'];
            $this->Society->addSociety($name, $object, $leader, $residence, $address, $tel, $email, $date_creation);
            $society = $this->Society->getSocietyByAllInformation($name, $object, $leader, $residence, $address, $tel, $email, $date_creation);
            $this->Document->addDocument($society['id'], $id1, $numero1, $path1);
            $this->Document->addDocument($society['id'], $id2, $numero2, $path2);
            $this->Document->addDocument($society['id'], $id3, $numero3, $path3);
            redirect('Signup');
        } else {
            // Si le téléchargement a échoué, vous pouvez récupérer l'erreur en utilisant $this->upload->display_errors()
            $error = array('error' => $this->upload->display_errors());
            // Afficher les erreurs
            redirect("Welcome");
        }
    }
}
