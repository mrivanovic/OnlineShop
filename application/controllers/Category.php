<?php

class Category extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
      //  $this->load->model('Product');
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
    }

}