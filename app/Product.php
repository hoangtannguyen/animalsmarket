<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name','description','price','promotion_price','image','selling','category_id','acce_id','nawing_id','type_id'];

    public function categoryid(){
        return $this->belongsTo('App\Category','category_id','id');
    }


    public function product_acce(){
        return $this->belongsTo('App\ProductAcce','acce_id','id');
    }

    public function product_type(){
        return $this->belongsTo('App\ProductType','type_id','id');
    }

    public function product_nawing(){
        return $this->belongsTo('App\ProductNawing','nawing_id','id');
    }


}
