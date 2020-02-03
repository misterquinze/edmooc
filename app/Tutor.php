<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone',
        'category_id'
    ];

    public function course(){
        return $this->hasOne('App\course');
    }

    public function topic(){
        return $this->hasMany('App\topic');
    }

    public function category(){
        return $this->hasOne('App\category');
    }
}
