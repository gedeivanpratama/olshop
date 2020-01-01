<?php
use Valitron\Validator as Validator;
use app\traits\SidebarTrait;
class Dasboard extends Controller{

    use SidebarTrait;

    public function __construct()
    {
        if(!isset($_SESSION['id_rolle'])){
            header('location: '.BASEURL);
        }
    }

    public function index()
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();
        
        $this->view('admin/header', $data);
        $this->view('admin/dasboard');
        $this->view('admin/footer');
    }
}