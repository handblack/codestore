<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enviroment extends CI_Controller {
    public function index(){
        $this->load->view('enviroment/generales');
    }
}