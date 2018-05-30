    <?php

class Category extends CI_Controller
{
    public function __construct()
    {
        parent:: __construct();
        $this->load->model("ProductModel");
        $this->load->library('session');
    }
    public function loadView($glavnideo, $data)
    {
        $this->load->view('sabloni/header.php', $data);
        $this->load->view($glavnideo, $data);
        $this->load->view('sabloni/footer.php');
    }
    public function index()
    {
        $data['product'] = $this->ProductModel->all();
        $this->loadView('index.php', $data);
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
    public function insertProduct()
    {
        $data = array(
            'image0' => $_FILES['image0'],
            'image1' => $_FILES['image1'],
            'image2' => $_FILES['image2'],
            'image3' => $_FILES['image3'],
            'main_image' => $_FILES['main_image'],
            'name' => $this->input->post('name'),
            'descriptions' => $this->input->post('desc'),
            'seller_mail' => $_SESSION['mail'],
            'category_id' => $this->input->post('category'),
            'Price' => $this->input->post('price'),
            'Currency_id' => $this->input->post('currency'),
            'Delivery_id' => $this->input->post('delivery'),
        );

        $this->ProductModel->addProduct($data);
        redirect('Account/index');
    }
    public function adwertUpdate()
    {   if(isset($_POST['update'])) {
        $mail = $_SESSION['mail'];
        $idProduct = $this->input->post('id');
        $name = $this->input->post('name');
        $desc = $this->input->post('desc');
        $price = $this->input->post('price');
        $this->ProductModel->adwertUpdate($idProduct, $name, $desc, $price, $mail);
        redirect('Account/advertView+');
        
    } else if(isset($_POST['delete'])) {
        $idProduct = $this->input->post('id');
        $this->ProductModel->delete($idProduct);
        redirect('Account/advertView');
        }
    }
    public function menu() 
    {
        $id = $this->input->get('id');
        $data['product'] = $this->ProductModel->GetProductsFromCategory($id);
        $this->loadView('index.php', $data);
        
    }
    
}   