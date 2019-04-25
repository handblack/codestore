<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends MY_Controller {
    public function index(){
        $this->_render_home('homepage/home');
    }
    
}
