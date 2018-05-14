<?php

class Account extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("AccountModel");
        $this->load->library('session');
    }

    public function login($poruka=NULL) {
        $podaci=array();
        if($poruka)
            $podaci['poruka']=$poruka;
        $this->loadView($podaci, 'login.php');
        
    }

    public function ulogujse() {
        $this->form_validation->set_rules("mail", "Email", "required");
        $this->form_validation->set_rules("password", "Password", "required");
        if($this->form_validation->run())
        {
            $this->modelAcount->email= $this->input->post('mail');
            if(!$this->modelAcount->postojiEmail())
                $this->login("Ne postoji email!");
            else if(!$this->modelAcount->ispravanpassword($this->input->post('password')))
        $this->login("Neispravan password!");
            else{
                $this->load->library('session');
                $this->session->set_userdata('buyer', $this->modelAcount);
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
        $this->form_validation->set_rules('dname', 'name');
        $this->form_validation->set_rules('dlastname', 'lasname');
        $this->form_validation->set_rules('dmail', 'mail');
        $this->form_validation->set_rules('dpassword', 'mail');
        $this->form_validation->set_rules('dpasswordC', 'passwordC');
        $this->form_validation->set_rules('dcountry', 'country');
        $this->form_validation->set_rules('dcity', 'city');
        $this->form_validation->set_rules('dadress', 'adress');
        $this->form_validation->set_rules('dtel', 'tel');
        $this->form_validation->set_rules('ddate', ' date');
        if($this->form_validation->run() == FALSE) {
            $this->load->view('Category/SignUpP');
        } else {
            $data = array (
                'Name' => $this->input->post('dname'),
                'Last Name' => $this->input->post('dlastname'),
                'Email' => $this->input->post('dmail'),
                'Password' => $this->input->post('dpassword'),
                'Country' => $this->input->post('dcountry'),
                'City' => $this->input->post('dcity'),
                'Adress' => $this->input->post('dadress'),
                'Tel' => $this->input->post('dtel'),
                'Date of birth' => $this->input->post('ddate'),
            );
            $this->AccountModel->SignUpP($data);
            $data['message'] = 'Data Inserted Successfully';
            redirect('Category/index');
        }
    }

}
