<?php

class Msecurity extends CI_Model {
    public function validate($user='s',$pass='x'){
        // Condicinamos la validacion
       
        $this->db->where('username',$user);
        $this->db->where('userpass',$pass);
        //Ejecutamos al consutla
        $result = $this->db->get('dt_user');
        
        //echo '<hr>';
        if($result->num_rows == 1){
            $row = $result->row();
            var_dump($row);
            $data = array(
                        'login_user_id' => $row->user_id
                    );
            $this->session->set_userdata($data);
            echo '<li>TRUE';
            return TRUE;
        }
        // Si no tenemos valores retornamos el valor
        echo '<li>FALSE';
        return FALSE;
    }
    
}