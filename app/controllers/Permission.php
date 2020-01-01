<?php
use app\models\Module as Modul;
use app\models\Rolle;
use Illuminate\Database\Capsule\Manager as DB;
use Valitron\Validator as Validator;
use app\traits\SidebarTrait;
class Permission extends Controller
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

        $data['permission'] = DB::table('roletomodule')
        ->join('tb_module','tb_module.id','=','roletomodule.module_id')
        ->join('tb_rolle','tb_rolle.id','=','roletomodule.rolle_id')
        ->select('roletomodule.id as id','tb_rolle.name as r_name','tb_module.name as m_name')
        ->get();

        $this->view('admin/header',$data);
        $this->view('admin/permission/index', $data);
        $this->view('admin/footer');
    }

    public function create()
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();

        $data['module'] = Modul::all();
        $data['rolle'] = Rolle::all();
        $this->view('admin/header',$data);
        $this->view('admin/permission/create', $data);
        $this->view('admin/footer');
    }

    public function store()
    {
        $v = new Validator($_POST);
        $v->rule('required', ['rolle','module']);
        if(!$v->validate()){
            Msg::set($v->errors());
            header('location: '.BASEURL . '/Permission/create/');
            exit;
        }

        DB::table('roletomodule')->insert(
            ['rolle_id' => $_POST['rolle'], 'module_id' => $_POST['module']]
        );

        header('location: '.BASEURL . '/Permission');
    }

    public function edit($id)
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();
        
        $data['roletomodule'] = DB::table('roletomodule')
        ->select('rolle_id','module_id')
        ->where('id', '=', $id)->first();

        $data['module'] = Modul::all();
        $data['rolle'] = Rolle::all();
        $this->view('admin/header',$data);
        $this->view('admin/permission/edit', $data);
        $this->view('admin/footer');
    }

    public function delete($id)
    {
        if(empty($id)){
            header('location: '.BASEURL . '/Permission');
        }

        DB::table('roletomodule')->where('id', '=', $id)->delete();

        header('location: '.BASEURL . '/Permission');
    }
}