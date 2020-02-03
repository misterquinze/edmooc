<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proficiency extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    public function tutor(){
        return $this->belongsToMany('App\tutor');
    }
}
