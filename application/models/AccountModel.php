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
    public function can_login($mail, $password)
    {
        $this->db->where('mail', $mail);
        $this->db->where('password', $password);
        $query=$this->db->get('seller');

        //select * from seller where mail='$mail='$mail' and password = '$password'

        if($query->num_rows()>0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }

    }
}