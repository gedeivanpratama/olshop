<?php 
namespace app\models;
use Illuminate\Database\Eloquent\Model as Eloquent;
class Module extends Eloquent{
    public $timestamps = [];
    protected $table = 'tb_module';
    protected $fillable = ['name', 'description'];

    public function rolle(){
        $this->belongsTo('app\models\Rolle');
    }
}