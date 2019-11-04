<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Favorite extends Model
{
    protected $fillable = [
        
        'user_id',
        'course_id'
    ];

    public function course (){
        return $this->hasMany('App\course');
    }
    
}
