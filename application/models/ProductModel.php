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

    private function uploadImage($image, $product_id)
    {
        $s = DIRECTORY_SEPARATOR; // Kosa crta za putanju koja se menja u zavisnosti od platforme: Windows \ Linux /

        $path = $image['tmp_name']; // Privremeno ime slike na serveru

        $date = date_create();
        $unixtime = date_timestamp_get($date); // Unikatni datum

        $save_path = 'img'.$s.'products'.$s; // Putanja gde treba da se sacuva slika na serveru / folder
        $filename = $product_id.'_'.$unixtime.'_'.$image['name']; // Novi naziv slike sa unikatnim datumom i prefiksom koji je id proizvoda
        $base_path = __DIR__.$s.'..'.$s.'..'.$s; // Osnovna putanja do foldera img

        $image_save = 'img/products/'.$filename; // Tekst koji se upisuje u bazu

        copy($path, $base_path.$save_path.$filename); // Kopiranje privremene slike u img/products folder

        return $image_save;
    }

    public function addProduct($data)
    {
        $toInsert = $data;
        // kopiram niz $data u $toInsert da bih mogao da manipulisem nekim podatcima
        // hocu da iz tog niza izbacim main_image i images jer to ne moze da se doda u products tabelu
        // ali takodje zelim da ih sacuvam u data da bih mogao da ih dodam u tabelu images
        unset($toInsert['main_image']);
        unset($toInsert['image0']);
        unset($toInsert['image1']);
        unset($toInsert['image2']);
        unset($toInsert['image3']);


        // Dodajem proizvod u bazu
        $product = $this->db->insert('products', $toInsert);

        // Uzimam id do tog proizvoda da bih mogao da taj isti id ubacim u tabelu images
        // da bih obelezio kom proizvodu pripada
        $insert_id = $this->db->insert_id();

        // Ovde dodajem main image, glavnu sliku tog proizvoda
        $main_image = [
            'name' => $data['main_image']['name'], // ovde uzimam ime od slike koju uploadujem
            'mime-type' => mime_content_type($data['main_image']['tmp_name']), // ovde uzimam mime_type
            'extension' => pathinfo($data['main_image']['name'], PATHINFO_EXTENSION), // ovde izvlacim ekstenziju iz imena slike
            'main' => 1, // stavljamo 1 jer je ovo main slika sto dodajemo ovde
            'path' => $this->uploadImage($data['main_image'], $insert_id),
            'products_id' => $insert_id // stavljamo id od proizvoda
        ];
        $this->db->insert('images', $main_image);

        // Ovde dodajem ostale slike koje nisu glavne koristeci for petlju
        for($i = 0; $i < 4; $i++) {
            $image = [
                'name' => $data['image'.$i]['name'], // ovde uzimam ime od slike koju uploadujem
                'mime-type' => mime_content_type($data['image'.$i]['tmp_name']), // ovde uzimam mime_type
                'extension' => pathinfo($data['image'.$i]['name'], PATHINFO_EXTENSION), // ovde izvlacim ekstenziju iz imena slike
                'main' => 0, // stavljamo 0 jer je ovo nije main slika sto dodajemo ovde
                'path' => $this->uploadImage($data['image'.$i], $insert_id),
                'products_id' => $insert_id // stavljamo id od proizvoda
            ];
            $this->db->insert('images', $image);
        }
    }
    public function all($limit, $offset)
    {
        $query = $this->db
                            ->select('*')
                            ->from('products')
                            ->limit($limit, $offset)
                            ->get();
        
        $result= $query->result_array();

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
     public function num_rows()
    {
        $query = $this->db
                            ->select('*')
                            ->from('products')
                            ->get();
        
        return $query->num_rows();
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
    
    public function num_rows_pretraga($naziv)
    {
                $query = $this->db
                            ->select('*')
                            ->from('products')
                        ->or_like("descriptions", $naziv)
        ->or_like("delivery_id", $naziv)
        ->or_like("price", $naziv)
        ->or_like("currency_id", $naziv)
       ->or_like("seller_mail", $naziv)
                        ->get();
       
        return $query->num_rows();
    }
    public function pretraga($naziv,$limit, $offset){

        $this->db->like("name", $naziv);
        $this->db->or_like("descriptions", $naziv);
        $this->db->or_like("delivery_id", $naziv);
        $this->db->or_like("price", $naziv);
        $this->db->or_like("currency_id", $naziv);
        $this->db->or_like("seller_mail", $naziv);
        $this->db->from("products");
        $this->db->limit($limit, $offset);
        $this->db->select("*");

        $query=$this->db->get();


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
        $item = $query->row_array();

        $_images = $this->db->query("select * from images where products_id = {$item['id']}");
        $_category = $this->db->query("select * from category where id = {$item['category_id']}");
        $_currency = $this->db->query("select * from currency where id = {$item['currency_id']}");
        $_delivery = $this->db->query("select * from delivery where id = {$item['delivery_id']}");
        $_seller = $this->db->query("select * from seller where mail = '{$item['seller_mail']}'");

        $images = $_images->result_array();
        $category = $_category->row();
        $currency = $_currency->row();
        $delivery = $_delivery->row();
        $seller = $_seller->row_array();

        $return = [];

        $return['info'] = $item;
        $return['images'] = $images;
        $return['category'] = $category->ime;
        $return['currency'] = $currency->name;
        $return['delivery'] = $delivery->name;
        $return['seller'] = $seller;

        return $return;
    }
    
    function favorite($id, $mail)
    {
        $this->db->insert('favorite', ['buyer_mail'=>$mail,'products_id'=>$id]);
    }
    function unfavorite($id, $mail)
    {   
        $this->db->delete('favorite', ['buyer_mail'=>$mail,'products_id'=>$id]);
    }
    function favoritesProductes($mail)
    {
       $query=$this->db->query("select * from favorite, products where buyer_mail='$mail' and products_id=id");
    $result= $query->result_array();

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
    public function GetProductsFromCategory($id)
    {
        $query = $this->db->query("select * from products where category_id = '{$id}';");
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
    public function order($data) 
    {
        $this->db->insert('orders', $data);
    }
}