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
    public function can_login($mail, $password, $type)
    {
        $this->db->where('mail', $mail);
        $this->db->where('password', $password);
        $query=$this->db->get($type);
        if($query->num_rows()>0) {
            return TRUE;
        } else  {
            return FALSE;
        }
    }

    public function isLoggedIn()
    {
        if (isset($_SESSION['mail']))
            return true;
        return false;
    }

    public function loggedInUser()
    {
        $mail = $_SESSION['mail'];
        $query = $this->db->query("SELECT * FROM `seller` WHERE `mail` = '{$mail}'");

        return $query->result_object()[0];
    }
    public function update($name, $lastname, $adress, $country, $tel, $city, $mailID) {
        $this->db->set("name", $name);
        $this->db->set("lastname",$lastname);
        $this->db->set("adress", $adress);
        $this->db->set("country",$country);
        $this->db->set("tel",$tel);
        $this->db->set("city",$city);
        $this->db->where("mail", $mailID);
        $this->db->update("seller");
    }
    public function updatePass($pass, $mailID)
    {
        $this->db->set('password',$pass);
        $this->db->where('mail', $mailID);
        $this->db->update('seller');
    }
    public function delete($idseller)
    {
        $this->db->where("mail",$idseller);
        $this->db->delete("seller");
    }
    public function signUpB($data)
    {
        $this->db->insert('buyer', $data);
    }
 
}