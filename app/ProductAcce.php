<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAcce extends Model
{
    protected $table = 'product_acce';
    protected $fillable = ['name'];


    public function product(){
        return $this->hasMany('App\Product','acce_id','id');
    }
}
