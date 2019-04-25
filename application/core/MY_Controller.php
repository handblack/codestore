<?php

class MY_Controller extends CI_Controller{
    function __construct(){
        parent::__construct();
    }
    public function _render_home($vista,$param = false){
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->view('homepage/header');
        $this->load->view($vista,$param);
        $this->load->view('homepage/footer');
    }
    public function _render($vista,$param = false){
        $this->load->view('dashboard/header');
        $this->load->view($vista,$param);
        $this->load->view('dashboard/footer');
    }

}