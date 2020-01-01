<?php
use app\models\Module as Modul;
use app\models\Rolle;
use Valitron\Validator as Validator;
use app\traits\SidebarTrait;

class Module extends Controller
{
    // add trait for menu sidebar
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
        $data['module'] = Modul::all();

        $this->view('admin/header',$data);
        $this->view('admin/module/index', $data);
        $this->view('admin/footer');
    }

    public function create()
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();
        $data['rolle'] = Rolle::all();
        $this->view('admin/header', $data);
        $this->view('admin/module/create', $data);
        $this->view('admin/footer');
    }

    public function store()
    {
        $v = new Validator($_POST);
        $v->rule('required', ['name']);
        if(!$v->validate()){
            Msg::set($v->errors());
            header('location: '.BASEURL . '/Module/create/');
            exit;
        }

        $module = new Modul();
        $module->name = $_POST['name'];
        $module->description = $_POST['description'];
        $module->save();
        header('location: '.BASEURL . '/Module');
    }

    public function edit($id)
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();
        $data['module'] = Modul::find($id);
        $data['rolle'] = Rolle::all();
        $this->view('admin/header', $data);
        $this->view('admin/module/edit', $data);
        $this->view('admin/footer');
    }

    public function update($id)
    {
        $v = new Validator($_POST);
        $v->rule('required', ['name']);
        if(!$v->validate()){
            Msg::set($v->errors());
            header('location: '.BASEURL . '/Module/edit/'. $id);
            exit;
        }

        $module = Modul::find($id);
        $module->name = $_POST['name'];
        $module->description = $_POST['description'];
        $module->save();

        header('location: '.BASEURL . '/Module');

    }

    public function delete($id)
    {
        if(empty($id)){
            header('location: '.BASEURL . '/Module');
        }
        
        $module = Modul::find($id);
        $module->delete();
        header('location: '.BASEURL . '/Module');
    }
}