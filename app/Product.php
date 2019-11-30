<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function orders(){
        return $this->belongsToMany(order::class,'order_product','product_id','order_id')->withTimestamps();
    }
}
