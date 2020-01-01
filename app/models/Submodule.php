<?php
namespace app\models;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Submodule extends Eloquent{

    public $timestamps = [];
    protected $table = 'tb_subModule';
    protected $fillable = ['name', 'url','module_id'];

}