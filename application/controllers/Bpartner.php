<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bpartner extends CI_Controller {
    public function index(){
        $this->load->view('dashboard/info');
    }

}
