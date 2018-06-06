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
    public function index() {
        $trazi = $this->input->get('search');
        $this->load->library('pagination');
        $this->config->load('bootstrap_pagination');
        $config=$this->config->item('pagination');
        if($trazi==NULL)
            $ukupno=$this->ProductModel->num_rows();
        else
            $ukupno=$this->ProductModel->num_rows_pretraga($trazi);

        $config += [
            'base_url' => base_url('Account/index'),
            'per_page' => 6,
            
            'total_rows' => $ukupno
        ];
         if($trazi!=NULL){
            if (count($_GET) > 0) $config['suffix'] = '?search='.$trazi;
            $config['first_url'] = $config['base_url'].'?search='.$trazi;
        }
        $this->pagination->initialize($config);
        
         if ($trazi == NULL)
             $data['product']  = $this->ProductModel->all($config['per_page'], $this->uri->segment(3));
        else
             $data['product']  = $this->ProductModel->pretraga($trazi, $config['per_page'], $this->uri->segment(3)); //to do
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
        $this->form_validation->set_rules('dname', 'name', 'required|max_length[20]|callback_test');
        $this->form_validation->set_rules('dlastname', 'lastname', "required|max_length[25]|callback_testA");
        $this->form_validation->set_rules('demail', 'mail', "required|callback_testB");
        $this->form_validation->set_rules('dpassword', 'password', "required|callback_testC");
        $this->form_validation->set_rules('dpasswordC', 'passwordC', "required");
        $this->form_validation->set_rules('dcountry', 'country');
        $this->form_validation->set_rules('dcity', 'city', "required|max_length[25]|callback_testE");
        $this->form_validation->set_rules('dadress', 'adress', "required|max_length[25]|callback_testF");
        $this->form_validation->set_rules('dtel', 'tel', "required");
        $this->form_validation->set_rules('ddate', ' date', "required");
        $this->form_validation->set_message("required", "<font color='red'> <i>{field} <small>field is required!</small></i></font>");//proveriti da li treba field da se upise

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
    public function test($naziv){
        if(preg_match("([A-Z][a-z]+)", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('test', '<font color="red"> <i>{field} <small> is not in the correct format!<br>The first letter must be capital!</small></i></font>');
           return FALSE;
        }
    }
    public function testA($naziv){
        if(preg_match("([A-Z][a-z]+)", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('testA', '<font color="red"> <i>{field}<small> is not in the correct format!<br>The first letter must be capital!</small></i></font>');
           return FALSE;
        }
    }
    public function testB($naziv){
        if(preg_match("(([a-z]{4,}|\.[a-z]+|[0-9]+)@[a-z]+\.[a-z]{3})", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('testB', '<font color="red"> <i>{field}<small> is not in the correct format!</small></i></font>');
           return FALSE;
        }
    }
    public function testC($naziv){
        if(preg_match("([A-Z][a-z]{5,20}[0-9]+)", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('testC', '<font color="red"> <i>{field} <small> is not in the correct format!<br>The first letter must be capital and also must contain one or more numbers!</small></i></font>');
           return FALSE;
        }
    }
    public function testE($naziv){
        if(preg_match("([A-Z][a-z]+)", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('testE', '<font color="red"> <i>{field}<small> is not in the correct format!<br>The first letter must be capital!</small></i></font>');
           return FALSE;
        }
    }
    public function testF($naziv){
        if(preg_match("(([A-Z]+[a-z]+|[A-Z]+[a-z]+\s[A-Z]+[a-z]+)\s[0-9]+)", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('testF', '<font color="red"> <i>{field}<small> is not in the correct format!<br>Must contain street name and street number!</small></i></font>');
           return FALSE;
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
        $data['inboxS'] = $this->AccountModel->sellerInbox();
        $this->loadView('sellerInbox.php', $data);
    }
    public function sellerSent()
    {
        $data['sentS'] = $this->AccountModel->sellerSent();
        $this->loadView('sellerSent.php', $data);
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
        $this->form_validation->set_rules('dname', 'name', 'required|max_length[20]|callback_test1');
        $this->form_validation->set_rules('dlastname', 'lastname', "required|max_length[25]|callback_test2");
        $this->form_validation->set_rules('demail', 'mail', "required|callback_test3");
        $this->form_validation->set_rules('dpassword', 'password', "required|callback_test4");
        $this->form_validation->set_rules('dpasswordC', 'passwordC', "required");
        $this->form_validation->set_rules('dcountry', 'country');
        $this->form_validation->set_rules('dcity', 'city', "required|max_length[25]|callback_test6");
        $this->form_validation->set_rules('dadress', 'adress', "required|max_length[25]|callback_test7");
        $this->form_validation->set_rules('dtel', 'tel', "required");
        $this->form_validation->set_rules('ddate', ' date', "required");
        $this->form_validation->set_message("required", "<font color='red'> <i>{field}<small> field is required!</small></i></font>");//proveriti da li treba field da se upise

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
    public function test1($naziv){
        if(preg_match("([A-Z][a-z]+)", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('test1', '<font color="red"> <i>{field}<small> is not in the correct format!<br>The first letter must be capital!</small></i></font>');
           return FALSE;
        }
    }
    public function test2($naziv){
        if(preg_match("([A-Z][a-z]+)", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('test2', '<font color="red"> <i>{field}<small> is not in the correct format!<br>The first letter must be capital!</small></i></font>');
           return FALSE;
        }
    }
    public function test3($naziv){
        if(preg_match("(([a-z]{4,}|\.[a-z]+|[0-9]+)@[a-z]+\.[a-z]{3})", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('test3', '<font color="red"> <i>{field}<small> is not in the correct format!</small></i></font>');
           return FALSE;
        }
    }
    public function test4($naziv){
        if(preg_match("([A-Z][a-z]{5,20}[0-9]+)", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('test4', '<font color="red"> <i>{field}<small> is not in the correct format!<br>The first letter must be capital and also must contain one or more numbers!</small></i></font>');
           return FALSE;
        }
    }
   
    public function test6($naziv){
        if(preg_match("([A-Z][a-z]+)", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('test6', '<font color="red"> <i>{field}<small> is not in the correct format!<br>The first letter must be capital!</small></i></font>');
           return FALSE;
        }
    }
    public function test7($naziv){
        if(preg_match("(([A-Z]+[a-z]+|[A-Z]+[a-z]+\s[A-Z]+[a-z]+)\s[0-9]+)", $naziv))
                return true;
        else
        {
           $this->form_validation->set_message('test7', '<font color="red"> <i>{field}<small> is not in the correct format!<br>Must contain street name and street number!</small></i></font>');
           return FALSE;
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
        $data['buyerS'] = $this->AccountModel->buyerSent();
        $this->loadView('buyerSent.php', $data);
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
        $this->load->library('pagination');
        $this->config->load('bootstrap_pagination');
        $config = $this->config->item('pagination');
        $config += [
            'base_url' => base_url('Account/indexB'),
            'per_page' => 6,
            'total_rows' => $this->ProductModel->num_rows(),
        ];
        $this->pagination->initialize($config);

        $data['products'] = $this->ProductModel->all($config['per_page'], $this->uri->segment(3));
        $this->loadView('indexB.php', $data);
    }
    public function productPage()
    {   
        $id = $this->input->get('id');
        $data['product'] = $this->ProductModel->productView($id);
        $this->loadView('productPage.php', $data);
    }
    
    public function favoriteArticle()
    {
        $id = $this->input->get('id');
        $this->ProductModel->favorite($id, $this->session->userdata('mail'));
    }
    public function unfavoriteArticle()
    {
        $id = $this->input->get('id');
        $this->ProductModel->unfavorite($id, $this->session->userdata('mail'));
    }
    public function messageB()
    {   
        $mailR = $this->input->post('receiver_mail');
        $text = $this->input->post('text');
        $data['product'] = $this->AccountModel->messages($text,  $mailR);
    }
}
