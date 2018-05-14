<?php

class AccountModel extends CI_Model
   
{
    public $mail;
    public $name;
    public $lastname;
    
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
        $this->db->where('mail', $this->mail);
        $result = $this->db->get('seller');
        if ($result->result())
            return TRUE;
        else
            return FALSE;
    }

    public function ispravanpassword($password)
    {
        $this->db->where('mail', $this->mail);
        $this->db->where('password', $password);
        $result->$this->db->get('seller');
        $seller=$result->row_array();
        
        if($seller!=NULL){
            $this->name=$seller['name'];
            $this->lastname=$seller['lastname'];
            return TRUE;
        }
        else
            return false;

    }
}