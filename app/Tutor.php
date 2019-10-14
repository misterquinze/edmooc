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
        'proficiency_id'
    ];

    public function course(){
        return $this->hasOne('App\course');
    }

    public function topic(){
        return $this->hasMany('App\topic');
    }

    public function proficiency(){
        return $this->hasOne('App\proficiency');
    }
}
