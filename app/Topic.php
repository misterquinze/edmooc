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

    public function course(){
        return $this->belongsTo('App\course');
    }

    public function tutor(){
        return $this->belongsTo('App\tutor');
    }
}
