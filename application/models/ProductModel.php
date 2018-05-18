<?php
class ProductModel extends CI_Model
{
    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function category()
    {
        $query = $this->db->query("select * from category");
        $result = $query->result_array();

        return $result;
    }
    public function delivery()
    {
        $query = $this->db->query("select * from delivery");
        $result = $query->result_array();

        return $result;
    }
    public function currency()
    {
        $query = $this->db->query("select * from currency");
        $result = $query->result_array();

        return $result;
    }
    public function addProduct($data)
    {
        /*$this->db->set('name', $data['Name']);
        $this->db->set('descriptions', $data['Description']);
        $this->db->set('price', $data['Price']);
        $this->db->set('delivery_id', $data['Delivery']);
        $this->db->set('currency_id', $data['Currency']);
        $this->db->set('category_id', $data['Category']);
        $this->db->set('seller_mail', $data['mail']);*/
        $this->db->insert('products', $data);
    }

}