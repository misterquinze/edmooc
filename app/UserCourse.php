<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCourse extends Model
{
    protected $fillable = [
        'user_id', 
        'course_id', 
        'course_enrolled', 
        'course_completed',
        'total_task_score',
        'average_task_score',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }
}
