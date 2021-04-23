<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = ['quantity', 'product_id', 'cart_id'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }

    public function cart(){
        return $this->belongsTo('App\Cart');
    }
}
