<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['client_id'];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function cartItems(){
        return $this->hasMany('App\CartItem')->with('product');
    }

    public function Client(){
        return $this->belongsTo('App\Client');
    }
}
