<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_type';
    protected $fillable = ['name'];

    public function product(){
        return $this->hasMany('App\Product','type_id','id');
    }
}

