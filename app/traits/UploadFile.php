<?php
namespace app\traits;

trait UploadFile{

    public $msgError = [];

    public function upload($file, $fileName)
    {
        // extraxt array file into variable 'name','type','tmp_name','error'
        extract($file);
        
        // check if the file is not selected
        if($error == 4){
            array_push($this->msgError , "file cannot be empty !");
            
        }
        
        // check if extension file is available
        $availableType = ['png','jpeg','jpg'];
        if(!empty($type)){
            $type = explode('/', $type);
            $type = end($type);
            if(!in_array($type, $availableType)){
                array_push($this->msgError , "file extension is not support !");
            }
        }
        
        // check file size
        if($size > 2000000){
            $this->msgError = "file size must less than 2 MB !";
        }
        
        if(empty($this->msgError)){
            return true;
        }

        return [$fileName => $this->msgError];
    }
}