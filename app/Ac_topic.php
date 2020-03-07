<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ac_topic extends Model
{
    protected $fillable = [
         
        'ac_course_id',
        'tutor_id',
        'name',
        'description',
        
    ];

    public function ac_course(){
        return $this->belongsTo('App\ac_course', 'ac_course_id');
    }

    public function tutor(){
        return $this->belongsTo('App\tutor');
    }

    public function content(){
        return $this->hasMany('App\content');
    }
}
