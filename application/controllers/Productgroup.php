<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Productgroup extends MY_Controller {

    private $data;
    private $APPNAME = 'Grupo de Productos';

    public function __construct() {
        parent::__construct();
        $this->xdb->set_tablename('dt_productgroup');
        $this->xdb->set_keyfield('productgroup_id');
        // No modificar debajo de esta linea
        $this->data['APPNAME'] = $this->APPNAME;
        define('_PATH', 'product');
        define('_PATHC', $this->router->fetch_class());
    }

    public function index() {
        $this->_crud(_PATH . '/' . $this->router->fetch_class(), $this->data);
    }

    /* ###################################################################################
     * NO MODIFICAR LAS SIGUIENES LINEAS
     * ################################################################################### 
     */
    public function crud($action = '') {
        $rows = array();
        $json = array();
        $json['Result'] = "OK";
        switch ($action) {
            case 'list':
                try {
                    $result = $this->xdb->get_list();
                    foreach ($result as $row) {
                        $rows[] = $row;
                    }
                    $json['Records'] = $rows;
                    $json['TotalRecordCount'] = count($rows);
                } catch (Exception $ex) {
                    $json['Result'] = "ERROR";
                    $json['Message'] = $ex->getMessage();
                }
                break;
            case 'create':
                $this->xdb->record_add($_POST);
                $sql = "SELECT * FROM " . $this->xdb->get_tablename() . " WHERE " . $this->xdb->get_keyfield() . " = LAST_INSERT_ID();";
                $json['Record'] = $this->db->query($sql)->row();
                break;
            case 'update':
                $this->xdb->record_update($_POST);
                break;
            case 'delete':
                $id = $_POST[$this->xdb->get_keyfield()];
                $this->xdb->record_delete($id);
                break;
            default: break;
        }
        print json_encode($json);
    }

}
