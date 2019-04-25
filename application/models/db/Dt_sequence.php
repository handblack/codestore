<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dt_sequence extends CI_Model {
    private $tablename = 'dt_sequence';
    private $keyfield  = 'sequence_id';
    public function __construct() {
        parent::__construct();
    }
    public function search($buscar){
        //$this->output->enable_profiler(TRUE);
        $filtro = str_replace(" ","%",$buscar).'%';
        $sql = "SELECT * FROM dt_bpartner WHERE alias LIKE '$filtro' OR code LIKE '$filtro' OR ruc LIKE '$filtro'";
        $result = $this->db->query($sql);
        return $result->result();
    }
    public function get_list(){
        $result = $this->db->get($this->tablename);
        return $result->result();   //Retorna como objeto el resultado
    }
    public function get_md5($md5){
        $sql = "SELECT * FROM {$this->tablename} WHERE md5({$this->keyfield}) = '$md5'";
        $result = $this->db->query($sql);
        $row = $result->result();
        return ($row) ? $row[0] : array() ;
    }
    public function get_id($id){
        $this->db->where($this->keyfield, $id);
        $result = $this->db->get($this->tablename);
        $row = $result->result();
        return ($row) ? $row[0] : array() ;
    }

    public function record_add($data){
        $this->db->insert($this->tablename, $data);
        if ($this->db->affected_rows() == '1'){
            // Almacenamos el ultimos ID para que podamos usar el LAST_INSERT_ID
            $row = (array)$this->db->query("SELECT MAX({$this->keyfield}) AS {$this->keyfield} FROM {$this->tablename};")->row();
            $this->session->set_flashdata('LAST_INSERT_ID', $row["$this->keyfield"]);
            return TRUE;
        }
        return FALSE;
    }

    public function record_update($data){
        var_dump($data);
        $this->db->where($this->keyfield, $data[$this->keyfield]);
        $result=$this->db->update($this->tablename, $data);
        return $result;
    }
    public function record_delete($id){
        $this->db->where($this->keyfield, $id);
        $this->db->delete($this->tablename);
    }
}