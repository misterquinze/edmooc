<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'name',
        'address',
        'phone',
        'description'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

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
