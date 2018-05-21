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
        if ($this->AccountModel->isLoggedIn())
            $this->load->view('sabloni/header_user.php', $data);
        else
            $this->load->view('sabloni/header.php', $data);

        $this->load->view($glavnideo, $data);
        $this->load->view('sabloni/footer.php');
    }
    public function index()
{
    $data['product'] = $this->ProductModel->all();
    $this->loadView('index.php', $data);
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
            if ($this->AccountModel->can_login($mail, $password, 'seller') || $this->AccountModel->can_login($mail, $password, 'buyer'))
            {
                $session_data=array(
                    'mail' => $mail);
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'Account/index');
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
}
