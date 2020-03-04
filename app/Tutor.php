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
        return $this->hasMany('App\course');
    }

    public function ac_course(){
        return $this->hasMany('App\ac_course');
    }

    public function topic(){
        return $this->hasMany('App\topic');
    }

    public function category(){
        return $this->hasOne('App\category');
    }
}
