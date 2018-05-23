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

        $return = array();
    
        foreach ($result as $item) {
            $_image = $this->db->query("select * from images where main = 1 and products_id = {$item['id']}");
            $_category = $this->db->query("select * from category where id = {$item['category_id']}");
            $_currency = $this->db->query("select * from currency where id = {$item['currency_id']}");
            $_delivery = $this->db->query("select * from delivery where id = {$item['delivery_id']}");
            
            $image = $_image->row();
            $category = $_category->row();
            $currency = $_currency->row();
            $delivery = $_delivery->row();

            $return[$item['id']] = array();
            $return[$item['id']]['info'] = $item;
            $return[$item['id']]['main_image'] = $image != null ? $image->path : 'img/img.png';
            $return[$item['id']]['category'] = $category->ime;
            $return[$item['id']]['currency'] = $currency->name;
            $return[$item['id']]['delivery'] = $delivery->name;
        }

        return $return;
    }
    public function adwertAll($mail)
    {
        $query = $this->db->query("select * from products where seller_mail = '{$mail}';");
        $result = $query->result_array();

        return $result;
    }
    public function adwertUpdate($idProduct, $name, $desc, $price, $mail)
    {
        $this->db->set('name', $name);
        $this->db->set('descriptions', $desc);
        $this->db->set('price', $price);
        $this->db->where('seller_mail', $mail);
        $this->db->where('id', $idProduct);
        $this->db->update('products');
    }
    public function delete($idProduct)
    {
        $this->db->where('id', $idProduct);
        $this->db->delete('products');
    }
    public function pretraga($naziv){

        $this->db->like("name", $naziv);
        $this->db->or_like("descriptions", $naziv);
        $this->db->or_like("delivery_id", $naziv);
        $this->db->or_like("price", $naziv);
        $this->db->or_like("currency_id", $naziv);
        $this->db->or_like("seller_mail", $naziv);
        $this->db->from("products");
        $this->db->select("name, descriptions, delivery_id, price, currency_id, seller_mail");

        $query=$this->db->get();

        return $query->result_array();
    }
    public function ProductBuyer()
    {
        $query = $this->db->query("select * from products;");
        $result = $query->result_array();

        $return = array();

        foreach ($result as $item) {
            $_image = $this->db->query("select * from images where main = 1 and products_id = {$item['id']}");
            $_category = $this->db->query("select * from category where id = {$item['category_id']}");
            $_currency = $this->db->query("select * from currency where id = {$item['currency_id']}");
            $_delivery = $this->db->query("select * from delivery where id = {$item['delivery_id']}");

            $image = $_image->row();
            $category = $_category->row();
            $currency = $_currency->row();
            $delivery = $_delivery->row();

            $return[$item['id']] = array();
            $return[$item['id']]['info'] = $item;
            $return[$item['id']]['main_image'] = $image != null ? $image->path : 'img/img.png';
            $return[$item['id']]['category'] = $category->ime;
            $return[$item['id']]['currency'] = $currency->name;
            $return[$item['id']]['delivery'] = $delivery->name;
            
        }

        return $return;
    }
    public function productView($id)
    {

        $query = $this->db->query("select * from products where id = '{$id}'");
        return $query->row();
    }
}