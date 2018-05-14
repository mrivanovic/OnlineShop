<?php

class AccountModel extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function SignUpP($data)
    {
<<<<<<< HEAD
        
=======
>>>>>>> 4ae630c004b48860dee1790f02b6b29d22603946
        $this->db->insert('seller', $data);
    }
    
    
    
     public function postojiEmail() {
        $this->db->where('mail', $this->email);
        $result = $this->db->get('seller');
        if ($result->result())
            return TRUE;
        else
            return FALSE;
    }

    public function ispravanpassword($password){
        $this->db->where('mail', $this->username);
        $this->db->where('password', $password);
        $result->$this->db->get('seller');
        $buyer=$result->row_array();
          
    }
}