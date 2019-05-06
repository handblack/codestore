<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bpartner extends MY_Controller {

    private $data;
    private $APPNAME = 'Maestro de Productos';
    private $rowperpage = 17;
    private $tableview = "dtv_product";

    public function __construct() {
        parent::__construct();
        $this->load->model('db/xdb');
        $this->xdb->set_tablename('dt_product');
        $this->xdb->set_keyfield('product_id');
        // No modificar debajo de esta linea
        $this->data['APPNAME'] = $this->APPNAME;
        $this->load->library('form_validation');
        $this->load->library('pagination');
        define('_PATH', $this->router->fetch_class());
    }

    public function index() {
        
        //$this->data['result'] = $this->xdb->get_list();
        $this->_render(_PATH . '/' . _PATH, $this->data);
    }

    public function edit($id = '') {
        $this->data['row'] = $this->xdb->get_id($id);
        $this->form_validation->set_rules('sequencename', 'Nombre del secuenciador', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->_render(_PATH.'/product_form', $this->data);
        } else {
            $row['sequencename'] = $this->input->post('sequencename');
            $row['serial'] = $this->input->post('serial');
            $row['sequence_id'] = $this->input->post('sequence_id');
            if ($this->dt_sequence->record_update($row)) {
                $this->session->set_flashdata('_success_message', 'Se guardo correctamente');
            } else {
                $this->session->set_flashdata('_error_message', 'Se ha generado un error');
            }
            redirect(site_url($this->router->fetch_class()));
        }
    }

    public function add() {
        //Capturamos los datos del formulario
        $row['sequencename'] = $this->input->post('sequencename');
        $row['serial'] = strtoupper($this->input->post('serial'));
        $row['isactive'] = 'N';
        if ($this->dt_sequence->record_add($row)) {
            redirect(site_url('sequence/edit/' . $this->session->LAST_INSERT_ID));
        } else {
            $this->session->set_flashdata('_error_message', 'No se pudo agregar el registro');
            redirect(site_url('sequence'));
        }
    }

    public function find(){
        //Recibimos los parametros desde un POST para luego almacenar en la session para las busquedas
        $this->session->set_userdata(array('_form_find' =>  strtoupper(@$this->input->post('buscar'))));
        $this->index();
    }

    public function loadRecord($rowno = 0) {
                if ($rowno != 0) {
            $rowno = ($rowno - 1) * $this->rowperpage;
        }
        $buscar = @$this->session->_form_find;
        // Obtenemos el contador y vamos armando el SQL
        $sql = "productname LIKE '%{$buscar}%'";
        $allcount = $this->xdb->get_counter($sql);
        // Obtnemos los registros de busqueda
        $sql = "SELECT * FROM {$this->tableview} WHERE {$sql} LIMIT {$rowno},{$this->rowperpage};";
    
        $result = $this->db->query($sql);
        //$allcount = $result->num_rows();
        $result = $result->result_array();
         
        //echo "$allcount\n";
        #echo $this->session->_form_find;
        #echo '***';
        #die();
        
        $config['base_url'] = site_url(_PATH) . '/loadRecord';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $this->rowperpage;

        $config['full_tag_open'] = '<div class="pagging text-center"><nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $result;
        $data['row'] = $rowno;
        $data['search'] = $buscar;
        $data['href'] = site_url(_PATH.'/edit/');

        echo json_encode($data);
    }

}
