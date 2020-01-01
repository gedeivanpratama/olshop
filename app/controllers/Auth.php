<?php
use app\models\User;
use Valitron\Validator as Validator;

class Auth extends Controller{

    public function index()
    {
        $this->view('web/header');
        $this->view('web/loginRegister');
        $this->view('web/footer');
    }

    public function login()
    {
        $v = new Validator($_POST);
        $v->rule('required', ['username','password']);
        if($v->validate()){
            $user = User::where('username', $_POST['username'])->first();
            if(is_null($user)){
                $_SESSION['sw-error'] = 'username atau password salah !';
                header('location: '.BASEURL . '/Auth');
                
            }
            $verify = password_verify($_POST['password'], $user->password);
            if($verify){
                $_SESSION['id_rolle'] = $user->id_rolle;
                header('location: '.BASEURL . '/Dasboard');
                exit;
            }
            
        }else{
            $_SESSION['error'] = $v->errors();
            header('location: '.BASEURL . '/Auth');
            exit;
        }
    }

    public function register()
    {
        $v = new Validator($_POST);
        $v->rule('lengthMin', ['username','password'],5);
        $v->rule('email',['email']);
        $v->rule('required', ['username','password','email']);
        if($v->validate()) {
            $user = new User();
            $user->username = $_POST['username'];
            $user->email = $_POST['email'];
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->id_rolle = 1;
            $user->save();

            $_SESSION['success'] = "registrasi telah berhasil";
            header('location: '.BASEURL . '/Auth');
        } else {
            $_SESSION['error'] = $v->errors();
            $_SESSION['sw-error'] = "registrasi gagal dilakukan";
            header('location: '.BASEURL . '/Auth');
            exit;
        }
    }

    public function logout()
    {
        if(isset($_SESSION['id_rolle']))
        {
            unset($_SESSION['id_rolle']);
            header('location: '.BASEURL . '/Auth');
        }
        header('location: '.BASEURL . '/Auth');
    }
}