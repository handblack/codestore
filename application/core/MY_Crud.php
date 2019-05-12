<?php

class MY_Crud extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('db/xdb');
    }

    

}
