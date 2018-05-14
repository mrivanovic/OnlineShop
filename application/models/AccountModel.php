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
}