<?php

class Category extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
<<<<<<< HEAD
       //$this->load->model();
=======
        $this->load->model('');
>>>>>>> 4ae630c004b48860dee1790f02b6b29d22603946
    }
    public function loadView($glavnideo, $data)
    {
        $this->load->view('sabloni/header.php', $data);
        $this->load->view($glavnideo, $data);
        $this->load->view('sabloni/footer.php');
    }
    public function index()
    {
        $this->loadView('index.php', []);
        //$this->load->view('index');
    }
    public function login()
    {
        $this->loadView('login.php', []);
    }
    public function signUp()
    {
        $this->loadView('signUp.php', []);
    }
    public function signUpP()
    {
        $this->loadView('signUpP.php', []);
    }
    public function signUpK()
    {
        $this->loadView('signUpK.php', []);
    }
}