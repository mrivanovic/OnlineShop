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

    public function login(){
        $data['array'];
        $this->load->view("login",$data);


    }
    public function ulogujse(){
        $this->load->library('form_validation');
        $this->form_validation->set_rules('mail', 'Mail','required');
        $this->form_validation->set_rules('password', 'Password','required');
        if($this->form_validation->run())
        {
            //true
            $mail= $this->input->post('mail');
            $password= $this->input->post('password');
            //model function
            $this->load->model('AccountModel');
            if($this->AccountModel->can_login($mail, $password))
            {
                $session_data=array(
                    'mail' => $mail);
                $this->session->set_userdata($session_data);
                redirect(base_url() . 'Category/index');

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
