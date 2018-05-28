<?php

class Account extends CI_Controller {

    public function __construct() {
        parent:: __construct();
        $this->load->model("AccountModel");
        $this->load->library('session');
        $this->load->model("ProductModel");
    }

    public function loadView($glavnideo, $data)
    {
        if ($this->AccountModel->isLoggedIn()) {
            if ($_SESSION['type'] == 'buyer') {
                $this->load->view('sabloni/header_buyer.php', $data);
            } elseif ($_SESSION['type'] == 'seller') {
                $this->load->view('sabloni/header_user.php', $data);
            }
        }
        else
            $this->load->view('sabloni/header.php', $data);

        $this->load->view($glavnideo, $data);
        $this->load->view('sabloni/footer.php');
    }
    public function index($trazi = NULL) {
        if ($trazi == NULL)
            $proizvodi = $this->ProductModel->all();
        else
            $proizvodi = $this->ProductModel->pretraga($trazi);
        $data['product'] = $proizvodi;
        $this->loadView('index.php', $data);
    }

    public function pretraga() {

        $trazi = $this->input->get('search');
        $this->index($trazi);
    }

    public function login(){
        $data['array']='';
        $this->load->view("login",$data);
    }
    public function ulogujse(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mail', 'Mail','required');
        $this->form_validation->set_rules('password', 'Password','required');
        if($this->form_validation->run())
        {
            $mail= $this->input->post('mail');
            $password= $this->input->post('password');
            $this->load->model('AccountModel');
            if ($this->AccountModel->can_login($mail, $password, 'seller'))
            {
                $session_data=array(
                    'mail' => $mail,
                    'type' => 'seller');

                $this->session->set_userdata($session_data);
                redirect(base_url() . 'Account/index');
            }elseif ($this->AccountModel->can_login($mail, $password, 'buyer'))
            {
                $session_data = array(
                    'mail' => $mail,
                    'type' => 'buyer');

                $this->session->set_userdata($session_data);
                redirect(base_url() . 'Account/indexB');
            }
            else
            {
                $this->session->set_flashdata('error', 'Invalid Username and Password');
                redirect(base_url() . 'Category/login');
            }
        }
        else{
            //false
            $this->login();
        }
    }
    public function LogOut()
    {
        $this->session->unset_userdata('mail');
        $this->session->sess_destroy();
        redirect('Category/index');
    }
    //-------------------seller----------------------------
    public function setImage()
    {
        $s = DIRECTORY_SEPARATOR; // Kosa crta za putanju koja se menja u zavisnosti od platforme: Windows \ Linux /

        $file = $_FILES['image']; // Ovde uzimas sliku iz zahteva
        $path = $file['tmp_name']; // Privremeno ime slike na serveru

        $date = date_create(); 
        $unixtime = date_timestamp_get($date); // Unikatni datum

        $save_path = 'img'.$s.'uploads'.$s; // Putanja gde treba da se sacuva slika na serveru / folder
        $filename = $unixtime.'_'.$file['name']; // Novi naziv slike sa unikatnim datumom
        $base_path = __DIR__.$s.'..'.$s.'..'.$s; // Osnovna putanja do foldera img

        $image_save = 'img/uploads/'.$filename; // Tekst koji se upisuje u bazu

        copy($path, $base_path.$save_path.$filename); // Kopiranje privremene slike u img/uploads folder

        $this->AccountModel->saveImage($image_save); // Dodavanje slike u bazu / update korisnika

        redirect('Account/sellerProfile');
    }

    public function registerP()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('dname', 'name', "required");
        $this->form_validation->set_rules('dlastname', 'lastname', "required");
        $this->form_validation->set_rules('demail', 'mail', "required");
        $this->form_validation->set_rules('dpassword', 'password', "required");
        $this->form_validation->set_rules('dpasswordC', 'passwordC', "required");
        $this->form_validation->set_rules('dcountry', 'country', "required");
        $this->form_validation->set_rules('dcity', 'city', "required");
        $this->form_validation->set_rules('dadress', 'adress', "required");
        $this->form_validation->set_rules('dtel', 'tel', "required");
        $this->form_validation->set_rules('ddate', ' date', "required");
        $this->form_validation->set_message("required", "Polje {field} je obavezno");//proveriti da li treba field da se upise

        if($this->form_validation->run() == FALSE) {
            $data['message'] = 'Error inserting user';
            $this->loadView('signUpP.php', $data);
        } else {
            if ($this->input->post('dpassword') == $this->input->post('dpasswordC')) {
                $data = array(
                    'Name' => $this->input->post('dname'),
                    'LastName' => $this->input->post('dlastname'),
                    'mail' => $this->input->post('demail'),
                    'Password' => $this->input->post('dpassword'),
                    'Country' => $this->input->post('dcountry'),
                    'City' => $this->input->post('dcity'),
                    'Adress' => $this->input->post('dadress'),
                    'Tel' => $this->input->post('dtel'),
                    'Dateofbirth' => $this->input->post('ddate'),
                );
                $this->AccountModel->SignUpP($data);//provera da li se uspesno registrovao fali
                redirect('Category/index');
            } else {
                $data['message'] = 'Password don\'t match';
                $this->loadView('signUpP.php', $data);
            }
        }
    }

    public function sellerProfile()
    {
        $data['user'] = $this->AccountModel->loggedInUser();
        $this->loadView('sellerProfile.php', $data);
    }
   
    public function update()
    {
        
        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $adress = $this->input->post('adress');
        $country = $this->input->post('country');
        $tel = $this->input->post('tel');
        $city = $this->input->post('city');
        $mailID = $this->input->post('mailID');
        $this->AccountModel->update($name, $lastname, $adress, $country, $tel, $city, $mailID);
        redirect('Account/sellerProfile');
    }
    public function updatePass()
    {
        $pass = $this->input->post('pass');
        $passC = $this->input->post('pass1');
        $mailID = $this->input->post('mailID');
        if ($pass == $passC) {
            $this->AccountModel->updatePass($pass, $mailID);
            redirect('Account/index');
            $data['message1'] = 'Update is successiful!';
        } else {
            $data['message1'] = 'Password don\'t match';
            redirect('Account/sellerProfile');
        }
    }
    public function delete()
    {
        $idseller=$this->input->post("idseller");
        $this->AccountModel->delete($idseller);
        redirect("Category/index");


    }
    public function sellerADD()
    {   
        $data['currency'] = $this->ProductModel->currency();
        $data['delivery'] = $this->ProductModel->delivery();
        $data['category'] = $this->ProductModel->category();
        $this->loadView('sellerADD.php', $data);
    }
    public function sellerInbox()
    {
        $this->loadView('sellerInbox.php', []);
    }
    public function sellerSent()
    {
        $this->loadView('sellerSent.php', []);
    }
    public function advertView()
    {
        $mail = $_SESSION['mail'];  
        $data['productsAll'] = $this->ProductModel->adwertAll($mail);
        $this->loadView('adwertView.php',  $data);
    }
    //*******************************BUYER********************************
    public function signUpB()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('dname', 'name', "required");
        $this->form_validation->set_rules('dlastname', 'lastname', "required");
        $this->form_validation->set_rules('demail', 'mail', "required");
        $this->form_validation->set_rules('dpassword', 'password', "required");
        $this->form_validation->set_rules('dpasswordC', 'passwordC', "required");
        $this->form_validation->set_rules('dcountry', 'country', "required");
        $this->form_validation->set_rules('dcity', 'city', "required");
        $this->form_validation->set_rules('dadress', 'adress', "required");
        $this->form_validation->set_rules('dtel', 'tel', "required");
        $this->form_validation->set_rules('ddate', ' date', "required");
        $this->form_validation->set_message("required", "Polje {field} je obavezno");//proveriti da li treba field da se upise

        if($this->form_validation->run() == FALSE) {
            $data['message'] = 'Error inserting user';
            $this->loadView('signUpP.php', $data);
        } else {
            if ($this->input->post('dpassword') == $this->input->post('dpasswordC')) {
                $data = array(
                    'Name' => $this->input->post('dname'),
                    'LastName' => $this->input->post('dlastname'),
                    'mail' => $this->input->post('demail'),
                    'Password' => $this->input->post('dpassword'),
                    'Country' => $this->input->post('dcountry'),
                    'City' => $this->input->post('dcity'),
                    'Adress' => $this->input->post('dadress'),
                    'Tel' => $this->input->post('dtel'),
                    'Dateofbirth' => $this->input->post('ddate'),
                );
                $this->AccountModel->signUpB($data);//provera da li se uspesno registrovao fali
                redirect('Category/index');
            } else {
                $data['message'] = 'Password don\'t match';
                $this->loadView('signUpP.php', $data);
            }
        }
    }

    public function buyerProfile()
    {
        $data['user'] = $this->AccountModel->loggedInUserB();
        $this->loadView('buyerProfile.php', $data);
    }
    public function  buyerInbox()
    {
        $this->loadView('buyerInbox.php', []);
    }
    public function buyerSent()
    {
        $this->loadView('buyerSent.php', []);
    }
    public function favorite()
    {
        $data['favorite']=$this->ProductModel->favoritesProductes($this->session->userdata('mail'));
        $this->loadView('buyerFavorite.php', $data);
    }
    public function History()
    {
        $this->loadView('buyerHistory.php', []);
    }
    public function updateB()
    {
        $name = $this->input->post('name');
        $lastname = $this->input->post('lastname');
        $adress = $this->input->post('adress');
        $country = $this->input->post('country');
        $tel = $this->input->post('tel');
        $city = $this->input->post('city');
        $mailID = $this->input->post('mailID');
        $this->AccountModel->updateB($name, $lastname, $adress, $country, $tel, $city, $mailID);
        redirect('Account/buyerProfile');
    }
    public function updatePassB()
    {
        $pass = $this->input->post('pass');
        $passC = $this->input->post('pass1');
        $mailID = $this->input->post('mailID');
        if ($pass == $passC) {
            $this->AccountModel->updatePassB($pass, $mailID);
            redirect('Account/indexB');
            $data['message1'] = 'Update is successiful!';
        } else {
            $data['message1'] = 'Password don\'t match';
            redirect('Account/buyerProfiles');
        }
    }
    public function deleteB()
    {
        $idbuyer = $this->input->post("idbuyer");
        $this->AccountModel->deleteB($idbuyer);
        redirect("Category/index");
    }
    public function setImageB()
    {
        $s = DIRECTORY_SEPARATOR; // Kosa crta za putanju koja se menja u zavisnosti od platforme: Windows \ Linux /

        $file = $_FILES['image']; // Ovde uzimas sliku iz zahteva
        $path = $file['tmp_name']; // Privremeno ime slike na serveru

        $date = date_create();
        $unixtime = date_timestamp_get($date); // Unikatni datum

        $save_path = 'img'.$s.'uploads'.$s; // Putanja gde treba da se sacuva slika na serveru / folder
        $filename = $unixtime.'_'.$file['name']; // Novi naziv slike sa unikatnim datumom
        $base_path = __DIR__.$s.'..'.$s.'..'.$s; // Osnovna putanja do foldera img

        $image_save = 'img/uploads/'.$filename; // Tekst koji se upisuje u bazu

        copy($path, $base_path.$save_path.$filename); // Kopiranje privremene slike u img/uploads folder

        $this->AccountModel->saveImageB($image_save); // Dodavanje slike u bazu / update korisnika

        redirect('Account/buyerProfile');
    }
    public function indexB()
    {
        $data['products'] = $this->ProductModel->ProductBuyer();
        $this->loadView('indexB.php', $data);
    }
    public function productPage()
    {   
        $id = $this->input->get('id');
        $data['product'] = $this->ProductModel->productView($id);
        $this->loadView('productPage.php', $data);
    }
    
    public function favoriteArticle(){
        $id = $this->input->get('id');
        $this->ProductModel->favorite($id, $this->session->userdata('mail'));
    }
    public function unfavoriteArticle(){
        $id = $this->input->get('id');
        $this->ProductModel->unfavorite($id, $this->session->userdata('mail'));
    }
}
