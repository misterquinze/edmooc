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

    public function course($id){
        $topics = App\Course::find($id)->topics;
       
        return $this->belongsTo('App\course', 'foreign_key');

    }

    public function tutor(){
        return $this->belongsTo('App\tutor');
    }

    public function content(){
        return $this->hasMany('App\content');
    }
}
