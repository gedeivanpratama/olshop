<?php
namespace app\models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Products extends Eloquent
{
    public $timestamps = [];
    protected $table = 'tb_product';
    protected $guarded = [];

}