<?php
namespace app\models;
use Illuminate\Database\Eloquent\Model as Eloquent;
class User extends Eloquent{

    public $timestamps = [];
    protected $table = 'tb_user';
    protected $fillable = ['username', 'password', 'id_rolle'];
}