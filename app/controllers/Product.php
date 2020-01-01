<?php

use Valitron\Validator as Validator;
use app\traits\SidebarTrait;
use app\models\Products;
use app\models\Images;


class Product extends Controller{

    use SidebarTrait;

    /**
     * start
     * the user need permission to access this method
     */
    
    public function index()
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();

        

        $this->view('admin/header',$data);
        $this->view('admin/product/index', $data);
        $this->view('admin/footer');
    }

    public function create()
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();
        $data['product'] = Products::get();
        $data['images'] = Images::get();

        // var_dump($data['images'])
        

        $this->view('admin/header',$data);
        $this->view('admin/product/create', $data);
        $this->view('admin/footer');
    }
    
    public function store()
    {
        $v = new Validator($_POST);
        $v->rule('required', ['name','qty','price']);
        if(!$v->validate()){
            Msg::set($v->errors());
            header('location: '.BASEURL . '/Product/create/');
            exit;
        }

        Products::create([
            'name' => $_POST['name'],
            'price' => $_POST['price'],
            'qty' => $_POST['qty'],
            'discount' => $_POST['discount'],
            'description' => $_POST['description']
        ]);

        header('location: '.BASEURL . '/Product/create/#step-2');
    }

    public function showProduct()
    {
        $this->view('web/header');
        $this->view('web/productDetail');
        $this->view('web/footer');
    }

    /**
     * end
     */

   
}