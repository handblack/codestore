<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Sequence extends MY_Controller {

    private $data;
    private $APPNAME = 'SERIES [sequence]';

    public function __construct() {
        parent::__construct();
        $this->data['APPNAME'] = $this->APPNAME;
        $this->load->model('db/dt_sequence');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->data['result'] = $this->dt_sequence->get_list();
        $this->_render('sequence/sequence', $this->data);
    }

    public function edit($id = '') {
        $this->data['row'] = $this->dt_sequence->get_id($id);
        $this->form_validation->set_rules('sequencename', 'Nombre del secuenciador', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $this->_render('sequence/formulario', $this->data);
        } else {
            $row['sequencename'] = $this->input->post('sequencename');
            $row['serial'] = $this->input->post('serial');
            $row['sequence_id'] = $this->input->post('sequence_id');
            if ($this->dt_sequence->record_update($row)){
                $this->session->set_flashdata('_success_message','Se guardo correctamente');
            }else{
                $this->session->set_flashdata('_error_message','Se ha generado un error');
            }
            redirect(site_url($this->router->fetch_class()));
        }
    }

    public function add(){
        //Capturamos los datos del formulario
        $row['sequencename'] = $this->input->post('sequencename');
        $row['serial'] = strtoupper($this->input->post('serial'));
        $row['isactive'] = 'N';
        if ($this->dt_sequence->record_add($row)) {
            redirect(site_url('sequence/edit/'.$this->session->LAST_INSERT_ID));
        } else {
            $this->session->set_flashdata('_error_message','No se pudo agregar el registro');
            redirect(site_url('sequence'));
        }
    }
}
