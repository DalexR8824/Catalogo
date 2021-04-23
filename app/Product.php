<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'image',
        'sku',
        'name',
        'description',
        'stock',
        'price',
        'sub_category_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function subCategory(){
        return $this->belongsto('App\SubCategory');
    }

    public function cartItems(){
        return $this->hasMany('App\CartItem');
    }

}
