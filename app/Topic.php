<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
         
        'course_id',
        'tutor_id',
        'name',
        'description',
        
    ];

    public function course(){
        return $this->belongsTo('App\course', 'course_id');
    }

    public function tutor(){
        return $this->belongsTo('App\tutor');
    }

    public function content(){
        return $this->hasMany('App\content');
    }
}
