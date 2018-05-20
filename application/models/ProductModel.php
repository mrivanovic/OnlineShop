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
        $this->db->insert('products', $data);
    }
    public function all()
    {
        $query = $this->db->query("select * from products;");
        $result = $query->result_array();

        return $result;
    }
    public function adwertAll($mail)
    {
        $query = $this->db->query("select * from products where seller_mail = '{$mail}';");
        $result = $query->result_array();

        return $result;
    }
}