<?php
use app\models\Rolle;
use app\traits\SidebarTrait;
use Valitron\Validator as Validator;
use app\datatables\SSP;

class Role extends Controller{

    use SidebarTrait;

    public function __construct()
    {
        if(!isset($_SESSION['id_rolle'])){
            header('location: '.BASEURL);
        }
    }

    public function indexjson()
    {
        
        $table = 'tb_rolle';
        
        $primaryKey = 'id';
        
        $columns = array(
            array( 'db' => 'id', 'dt' => 0 ),
            array( 'db' => 'name', 'dt' => 1 ),
            array( 'db' => 'description',  'dt' => 2 )
        );
        
        $sql_details = array(
            'user' => 'ivan',
            'pass' => 'ivanpkl2018',
            'db'   => 'db_oldshop',
            'host' => 'localhost'
        );
        
        echo json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
        );
    }

    public function index()
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();

        $data['role'] = Rolle::all();
        $this->view('admin/header', $data);
        $this->view('admin/role/index',$data);
        $this->view('admin/footer');
    }

    public function create()
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();

        $this->view('admin/header', $data);
        $this->view('admin/role/create');
        $this->view('admin/footer');
    }

    public function store()
    {
        $v = new Validator($_POST);
        $v->rule('required', ['name','description']);
        $v->rule('lengthMin', ['name','description'], 2);
        if(!$v->validate()){
            Msg::set($v->errors());
            header('location: '.BASEURL . '/Role/create/');
            exit;
        }
        
        $role = new Rolle;
        $role->name = $_POST['name'];
        $role->description = $_POST['description'];
        $role->save();
        header('location: '.BASEURL . '/Role');
    }

    public function edit($id)
    {
        $data['menu'] = $this->getMenu();
        $data['sub'] = $this->getSubmenu();

        $data['role'] = Rolle::find($id);
        $this->view('admin/header', $data);
        $this->view('admin/role/edit',$data);
        $this->view('admin/footer');
    }

    public function update($id)
    {
        $v = new Validator($_POST);
        $v->rule('required', ['name','description']);
        $v->rule('lengthMin', ['name','description'], 2);
        if(!$v->validate()) {
            Msg::set($v->errors());
            header('location: '.BASEURL . '/Role/edit/'.$id);
            exit;
        } 

        $role = Rolle::find($id);
        $role->name = $_POST['name'];
        $role->description = $_POST['description'];
        $role->save();
        header('location: '.BASEURL . '/Role');
    }

    public function delete($id)
    {
        if(empty($id)){
            header('location: '.BASEURL . '/Role');
        }

        $role = Rolle::find($id);
        $role->delete();
        header('location: '.BASEURL . '/Role');

    }
}