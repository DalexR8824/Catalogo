<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name', 
        'state'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function products(){
        return $this->hasMany('App\Product');
    }


}
