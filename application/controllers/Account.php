<?php

class Account extends CI_Controller {

    public function __construct() {
        parent:: __construct();

        $this->load->model("modelAcount");
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

}
