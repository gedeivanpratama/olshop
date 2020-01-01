<?php
use Valitron\Validator as Validator;
use app\traits\SidebarTrait;
use app\models\Images;
use app\traits\UploadFile;

class Image extends Controller
{
    use SidebarTrait, UploadFile;

    public function index()
    {

    }

    public function store()
    {
        $check = $this->upload($_FILES['image'],'image');
        if(!empty($check) && $check !== true){
            Msg::set($check);
            header('location: '.BASEURL . '/Product/create/#step-2');
            exit;
        }

        $uploadDir = $_SERVER['DOCUMENT_ROOT'] .'/BackEnd/oldshop/public/img/product/'.$_FILES['image']['name'];
        if(move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir)){

            Images::create([
                'image' => $_FILES['image']['name'],
                'product_id' => $_POST['product_id'],
                'description' => $_POST['description']
            ]);

            header('location: '.BASEURL . '/Product/create/#step-2');

        }


    }

    public function choose()
    {

        foreach ($_POST['id'] as $image_id) {
            $image = Images::find($image_id);
            $image->status = 1;
            $image->save();
        }

        header('location: '.BASEURL . '/Product/create/#step-3');

    }
}