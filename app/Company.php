<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'address',
        'phone'
    ];

    public function course(){
        return $this->hasMany('App\course');
    }
}
