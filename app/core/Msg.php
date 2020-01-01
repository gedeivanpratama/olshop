<?php

class Msg {

    public static function check($name)
    {
        if(!isset($_SESSION[$name])){
            return false;
            exit;
        }
        return true;
    }

    public static function set($msg = [])
    {
        
        $name = array_keys($msg);
        foreach($name as $value){
            foreach($msg[$value] as $val){
                $_SESSION[$value] = $val;
            }
        }
    }

    public static function get($name)
    {
        echo $_SESSION[$name];
        unset($_SESSION[$name]);
    }
}