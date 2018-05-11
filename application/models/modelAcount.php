<?php

class modelAcount extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function postojiEmail() {
        $this->db->where('mail', $this->email);
        $result = $this->db->get('buyer');
        if ($result->result())
            return TRUE;
        else
            return FALSE;
    }

    public function ispravanpassword($password){
        $this->db->where('mail', $this->username);
        $this->db->where('password', $password);
        $result->$this->db->get('buyer');
        $buyer=$result->row_array();
          
    }
}
