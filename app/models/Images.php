<?php
namespace app\models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Images extends Eloquent{

    public $timestamps = [];
    protected $table = 'tb_image';
    protected $guarded = [];

}