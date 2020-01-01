<?php
use app\models\Module as Modul;
use app\models\Rolle;
use app\models\Submodule as Sub;
use app\traits\SidebarTrait;
use Illuminate\Database\Capsule\Manager as DB;
use Valitron\Validator as Validator;
class SubModule extends Controller
{
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
        
        $data['submodule'] = DB::table('tb_subModule')
        ->leftJoin('tb_module','tb_subModule.module_id','=','tb_module.id')
        ->select('tb_subModule.id as id','tb_subModule.name as s_name','tb_module.name as m_name', 'url')
        ->get();

        $this->view('admin/header',$data);
        $this->view('admin/submodule/index', $data);
        $this->view('admin/footer');
    }

    public function create()
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();
        
        $data['module'] = Modul::all();
        $this->view('admin/header',$data);
        $this->view('admin/submodule/create', $data);
        $this->view('admin/footer');
    }

    public function store()
    {
        $v = new Validator($_POST);
        $v->rule('required', ['name','url','module']);
        if(!$v->validate()){
            Msg::set($v->errors());
            header('location: '.BASEURL . '/SubModule/create/');
            exit;
        }

        $sub = new Sub;
        $sub->name = $_POST['name'];
        $sub->url = $_POST['url'];
        $sub->module_id = $_POST['module'];
        $sub->save();
        header('location: '.BASEURL . '/SubModule');

    }

    public function edit($id)
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();

        $data['module'] = Modul::all();
        $data['submodule'] = Sub::find($id);
        $this->view('admin/header',$data);
        $this->view('admin/submodule/edit', $data);
        $this->view('admin/footer');
    }

    public function update($id)
    {
        $v = new Validator($_POST);
        $v->rule('required', ['name','url','module']);
        if(!$v->validate()){
            Msg::set($v->errors());
            header('location: '.BASEURL . '/SubModule/create/');
            exit;
        }

        $sub = Sub::find($id);
        $sub->name = $_POST['name'];
        $sub->url = $_POST['url'];
        $sub->module_id = $_POST['module'];
        $sub->save();
        header('location: '.BASEURL . '/SubModule');
    }

    public function delete($id)
    {
        if(empty($id)){
            header('location: '.BASEURL . '/SubModule');
        }
        
        $module = Sub::find($id);
        $module->delete();
        header('location: '.BASEURL . '/SubModule');
    }

}