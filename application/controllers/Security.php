<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('msecurity');
    }

    public function index2() {
        // Si no llamamos, redireccionamos al homepage
        redirect(base_url());
    }

    public function index() {
        $this->form_validation->set_rules('username', 'Product title', 'trim|required');
        $this->form_validation->set_rules('userpass', 'Product description', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('security/login', $this->data);
        } else {
            $user = $this->input->post('username');
            $pass = $this->input->post('userpass');
            if(!$this->msecurity->validate($user, $pass)) {
                redirect(site_url('dashboard'));
            } else {
                $data_error = array('errors' => validation_errors());
                $this->session->set_flashdata($data_error);
                $this->load->view('security/login', $this->data);
            }
        }
    }

    public function logout() {
        // Destruimos la cession
        @session_destroy();
        echo 'aqui hacemos el logout';
    }

}
