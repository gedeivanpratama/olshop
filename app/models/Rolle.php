<?php
namespace app\models;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Rolle extends Eloquent{
    public $timestamps = [];
    protected $table = 'tb_rolle';
    protected $fillable = ['name', 'description'];

    public function module()
    {
        return $this->hasMany('app\models\Module');
    }
}