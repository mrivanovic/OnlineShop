<?php

class AccountModel extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function SignUpP($data)
    {
        $this->db->insert('seller', $data);
    }
     public function postojiEmail()
     {
        $this->db->where('mail', $this->email);
        $result = $this->db->get('seller');
        if ($result->result())
            return TRUE;
        else
            return FALSE;
    }

    public function ispravanpassword($password)
    {
        $this->db->where('mail', $this->username);
        $this->db->where('password', $password);
        $result->$this->db->get('seller');
        $buyer=$result->row_array();

    }
}