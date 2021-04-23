<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'documentIden'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function carts(){
        return $this->hasMany('App\Cart');
    }
}
