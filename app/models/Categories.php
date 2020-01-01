<?php
namespace app\models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Categories extends Eloquent
{
    public $timestamps = [];
    protected $table = 'tb_category';
    protected $guarded = [];
}