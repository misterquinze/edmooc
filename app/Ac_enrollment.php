<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ac_enrollment extends Model
{
    //
    protected $fillable = [
        'user_id', 
        'ac_course_id', 
        'status'
    ];
   
    protected $table = "ac_enrollments";
    
    public function user()
    {
        return $this->belongsToMany('App\User');
    }
    public function ac_course()
    {
        return $this->belongsTo('App\Ac_course');
    }
}
