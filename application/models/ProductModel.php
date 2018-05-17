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
    
}