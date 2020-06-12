<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductNawing extends Model
{
    protected $table = 'product_nawing';
    protected $fillable = ['name'];

    public function product(){
        return $this->hasMany('App\Product','nawing_id','id');
    }
}
