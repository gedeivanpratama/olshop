<?php 
use app\models\Module as Modul;
use app\models\Submodule as Sub;

class Controller {

    public function checkLogin()
    {
        if(!isset($_SESSION['id_rolle'])){
            header('location: '.BASEURL . '/Module/create/');
            exit;
        }
    }

    public function view($view, $data = [])
    {
        ;
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}