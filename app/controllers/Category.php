<?php
use Valitron\Validator as Validator;
use app\traits\SidebarTrait;
use app\models\Categories;


class Category extends Controller
{
    use SidebarTrait;

    public function index()
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();

        $data['category'] = Categories::all();
        $this->view('admin/header', $data);
        $this->view('admin/category/index',$data);
        $this->view('admin/footer');
    }

    public function create()
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();
        

        $this->view('admin/header',$data);
        $this->view('admin/category/create', $data);
        $this->view('admin/footer');
    }

    public function store()
    {
        $v = new Validator($_POST);
        $v->rule('required', ['name']);
        if(!$v->validate()){
            Msg::set($v->errors());
            header('location: '.BASEURL . '/Category/create');
            exit;
        }

        Categories::create([
            'name' => $_POST['name'],
            'description' => $_POST['description']
        ]);

        header('location: '.BASEURL . '/Category');
    }

    public function edit($id)
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();
        $data['category'] = Categories::find($id);

        $this->view('admin/header',$data);
        $this->view('admin/category/edit', $data);
        $this->view('admin/footer');
    }

    public function update($id)
    {
        
        $v = new Validator($_POST);
        $v->rule('required', ['name']);

        if(!$v->validate()){
            Msg::set($v->errors());
            header('location: '.BASEURL . '/Category/edit/'.$id);
            exit;
        }

        $category = Categories::find($id);
        $category->name = $_POST['name'];
        $category->description = $_POST['description'];
        $category->save();

        header('location: '.BASEURL . '/Category');

    }

    public function delete($id)
    {
        if(!is_integer($id)){
            header('location: '.BASEURL . '/Category');
        }
        
        $category = Categories::find($id);
        $category->delete();
        header('location: '.BASEURL . '/Category');
    }
}