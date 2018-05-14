<?php

class Account extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("AccountModel");
        $this->load->library('session');
    }

    public function loadView($glavnideo, $data)
    {
        $this->load->view('sabloni/header_user.php', $data);
        $this->load->view($glavnideo, $data);
        $this->load->view('sabloni/footer.php');
    }
    
    public function login($poruka=NULL) {
        $data=array();
        if($poruka)
            $data['poruka']=$poruka;
        $this->loadView($data, 'login.php');
        
    }

    public function ulogujse() {
        $this->form_validation->set_rules("mail", "mail", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        $this->form_validation->set_message("required","Polje {field} je ostalo prazno.");
        if($this->form_validation->run())
        {
            $this->AccountModel->email= $this->input->post('mail');
            if(!$this->AccountModel->postojiEmail())
                $this->login("Ne postoji email!");
            else if(!$this->AccountModel->ispravanpassword($this->input->post('password')))
        $this->login("Neispravan password!");
            else{
                $this->load->library('session');
                $this->session->set_userdata('seller', $this->AccountModel);
                redirect("Category/index.php");
                     
                }        
            
            }
            else
                $this->login();

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
            $this->loadView('signUpP.php',[]);
        } else {
            $data = array (
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
            $data['message']='Data inserted successifully';
            redirect('Category/index');
        }
        
    }
    public function sellerProfile()
    {
        $this->loadView('sellerProfile.php', []);
    }
}
