<?php
namespace app\traits;
use app\models\Submodule as Sub;
use Illuminate\Database\Capsule\Manager as DB;

trait SidebarTrait{

    public function getMenu()
    {
        return DB::table('tb_module')
        ->join('roletomodule','roletomodule.module_id','=', 'tb_module.id')
        ->select('tb_module.id as id','rolle_id','name','description')
        ->where('rolle_id','=',$_SESSION['id_rolle'])
        ->orderByDesc('id')
        ->get();

    }

    public function getSubmenu()
    {
        return Sub::all();

    }
}