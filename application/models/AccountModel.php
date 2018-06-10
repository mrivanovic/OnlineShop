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
   public function messagesB($text,$mailR)
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
    public function messageS($text,  $mailR)
    {
        $mail = $_SESSION['mail'];

        $this->db->set('receiver_mail', $mailR);
        $this->db->set('receiver_type', 'buyer');
        $this->db->set('sender_mail', $mail);
        $this->db->set('sender_type', 'seller');
        $this->db->set('message', $text);
        $this->db->insert('messages');
    }
    public function buyerInbox()
    {
        $mail = $_SESSION['mail'];
        $query = $this->db->query("SELECT * FROM `messages` WHERE `receiver_mail` = '{$mail}'");
        $result = $query->result_array();

        return $result;
    }
    public function messageB($text,  $mailR)
    {
        $mail = $_SESSION['mail'];

        $this->db->set('receiver_mail', $mailR);
        $this->db->set('receiver_type', 'seller');
        $this->db->set('sender_mail', $mail);
        $this->db->set('sender_type', 'buyer');
        $this->db->set('message', $text);
        $this->db->insert('messages');
    }
    public function orderSeller()
    {
        $mail = $_SESSION['mail'];

        $query = $this->db->query("SELECT o.id, o.seller_mail, o.buyer_mail, p.name, p.descriptions, o.price, o.currency, o.sent, o.arrived FROM orders o JOIN products p on product_id = p.id WHERE o.seller_mail = '{$mail}'");
        $result = $query->result_array();
        return $result;
    }
    public function buyerOrders()
    {
        $mail = $_SESSION['mail'];

        $query = $this->db->query("SELECT o.id, o.seller_mail, o.buyer_mail, p.name, p.descriptions, o.price, o.currency, o.sent, o.arrived FROM orders o JOIN products p on product_id = p.id WHERE o.buyer_mail = '{$mail}' and o.sent IS NOT NULL and o.arrived IS NULL");
        $result = $query->result_array();
        return $result;
    }
    public function ordersSent($id)
    {
        $mail = $_SESSION['mail'];
        $this->db->set('sent', 'NOW()', false);
        $this->db->where('seller_mail', $mail);
        $this->db->where('id', $id);
        $this->db->update('orders');
    }
    public function ordersArrived($id)
    {
        $mail = $_SESSION['mail'];
        $this->db->set('arrived', 'NOW()', false);
        $this->db->where('buyer_mail', $mail);
        $this->db->where('id', $id);
        $this->db->update('orders');
    }
    public function status($text)
    {
        $mail = $_SESSION['mail'];
        $this->db->set('status', $text);
        $this->db->where('mail', $mail);
        $this->db->update('seller');
    }
    public function addcomment($text, $id, $mail)
    {
        $var = $this->db->query("SELECT * FROM orders WHERE buyer_mail = '{$mail}' and product_id ='{$id}'");
        $result = $var->result_array();

        if(count($result) > 0) {
            $this->db->set('content', $text);
            $this->db->set('buyer_mail', $mail);
            $this->db->set('product_id', $id);
            $this->db->insert('comments');
        }
    }
    public function like($mail, $seller_mail)
    {
        $var = $this->db->query("SELECT * FROM orders WHERE buyer_mail = '{$mail}' and seller_mail ='{$seller_mail}'");
        $result = $var->result_array();

        if(count($result) > 0) {
            $var = $this->db->query("SELECT * FROM likes WHERE buyer_mail = '{$mail}' and seller_mail ='{$seller_mail}'");
            $result = $var->result_array();

            if(count($result) > 0) {
                $this->db->where('buyer_mail', $mail);
                $this->db->where('seller_mail', $seller_mail);
                $this->db->set('reactions', 1);
                $this->db->update('likes');
            } else {
                $this->db->set('buyer_mail', $mail);
                $this->db->set('seller_mail', $seller_mail);
                $this->db->set('reactions', 1);
                $this->db->insert('likes');
            }
        }
    }
    public function dislike($mail, $seller_mail)
    {
        $var = $this->db->query("SELECT * FROM orders WHERE buyer_mail = '{$mail}' and seller_mail ='{$seller_mail}'");
        $result = $var->result_array();

        if(count($result) > 0) {
            $var = $this->db->query("SELECT * FROM likes WHERE buyer_mail = '{$mail}' and seller_mail ='{$seller_mail}'");
            $result = $var->result_array();

            if(count($result) > 0) {
                $this->db->where('buyer_mail', $mail);
                $this->db->where('seller_mail', $seller_mail);
                $this->db->set('reactions', 0);
                $this->db->update('likes');
            } else {
                $this->db->set('buyer_mail', $mail);
                $this->db->set('seller_mail', $seller_mail);
                $this->db->set('reactions', 0);
                $this->db->insert('likes');
            }
        }
    }

    public function totalLikesDislikes($seller_mail)
    {
        $var = $this->db->query("SELECT COUNT(`reactions`) AS `total` FROM `likes` WHERE `seller_mail` = '{$seller_mail}' AND `reactions` = 1");
        $likes = $var->row()->total;

        $var = $this->db->query("SELECT COUNT(`reactions`) AS `total` FROM `likes` WHERE `seller_mail` = '{$seller_mail}' AND `reactions` = 0");
        $dislikes = $var->row()->total;

        return [
            'likes' => $likes,
            'dislikes' => $dislikes
        ];
    }
}