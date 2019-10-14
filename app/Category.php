<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    public function course(){
        return $this->belongsToMany('App\course');
    }
}
