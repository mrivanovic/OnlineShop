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
}