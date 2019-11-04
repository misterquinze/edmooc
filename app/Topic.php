<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
         
        'course_id',
        'tutor_id',
        'name',
        'week',
        'start_date',
        'end_date'
    ];

    public function course($id){
        $topics = App\Course::find($id)->topics;
       
        return $this->belongsTo('App\course', 'foreign_key');

    }

    

    public function tutor(){
        return $this->belongsTo('App\tutor');
    }
}
