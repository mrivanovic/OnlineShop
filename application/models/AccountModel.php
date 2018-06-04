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

    public function saveImage($path)
    {
        $this->db->set('image',$path);
        $this->db->where('mail', $_SESSION['mail']);
        $this->db->update('seller');
    }
/*******************************BUYER*******************************/
    public function updateB($name, $lastname, $adress, $country, $tel, $city, $mailID) {
        $this->db->set("name", $name);
        $this->db->set("lastname",$lastname);
        $this->db->set("adress", $adress);
        $this->db->set("country",$country);
        $this->db->set("tel",$tel);
        $this->db->set("city",$city);
        $this->db->where("mail", $mailID);
        $this->db->update("buyer");
    }
    public function updatePassB($pass, $mailID)
    {
        $this->db->set('password',$pass);
        $this->db->where('mail', $mailID);
        $this->db->update('buyer');
    }
    public function deleteB($idbuyer)
    {
        $this->db->where("mail",$idbuyer);
        $this->db->delete("buyer");
    }
    public function signUpB($data)
    {
        $this->db->insert('buyer', $data);
    }
    public function saveImageB($path)
    {
        $this->db->set('image',$path);
        $this->db->where('mail', $_SESSION['mail']);
        $this->db->update('buyer');
    }
    public function loggedInUserB()
    {
        $mail = $_SESSION['mail'];
        $query = $this->db->query("SELECT * FROM `buyer` WHERE `mail` = '{$mail}'");

        return $query->result_object()[0];
    }
   public function messages($text,$mailR)
   {
       $mail = $_SESSION['mail'];

       $this->db->set('receiver_mail', $mailR);
       $this->db->set('receiver_type', 'seller');
       $this->db->set('sender_mail', $mail);
       $this->db->set('sender_type', 'buyer');
       $this->db->set('message', $text);
       $this->db->insert('messages');
   }
    public function sellerInbox()
    {
        $mail = $_SESSION['mail'];
        $query = $this->db->query("SELECT * FROM `messages` WHERE `receiver_mail` = '{$mail}'");
        $result = $query->result_array();

        return $result;
    }
    public function sellerSent()
    {
        $mail = $mail = $_SESSION['mail'];
        $query = $this->db->query("SELECT * FROM `messages` WHERE `sender_mail` = '{$mail}'");
        $result = $query->result_array();

        return $result;
    }
    public function buyerSent()
    {
        $mail = $mail = $_SESSION['mail'];
        $query = $this->db->query("SELECT * FROM `messages` WHERE `sender_mail` = '{$mail}'");
        $result = $query->result_array();

        return $result;
    }
}