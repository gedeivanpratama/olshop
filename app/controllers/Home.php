<?php 
use Valitron\Validator as Validator;
class Home extends Controller {

    public function index()
    {
        $this->view('web/header');
        $this->view('web/index');
        $this->view('web/footer');
    }

    public function create($username ='',$password = '',$id)
    {
        $v = new Validator(array('username' => $username, 'password' => $password));
        $v->rule('lengthMin', ['username','password'],10);
        $v->rule('required', ['username','password']);
        if($v->validate()) {
            echo "Yay! We're all good!";
        } else {
            
            print_r($v->errors());
            exit;
        }


        $user->username = $username;
        $user->password = $password;
        $user->id_rolle = $id;
        $user->save();
        
    }
}