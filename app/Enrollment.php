<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'user_id', 
        'course_id', 
        'status'
    ];
   
    protected $table = "enrollments";
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
