<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ac_discussion extends Model
{
    //
    protected $fillable = [
        'user_id',
        'ac_course_id',
        'title',
        'content'
    ];

    public function ac_course($id)
    {
        $discussions = App\Ac_course::find($id)->discussions;
       
        return $this->belongsTo('App\Ac_course', 'foreign_key');

    }

    public function user()
    {

        return $this->belongsTo('App\User', 'foreign_key');
    }

    public function ac_comments()
    {
        //$courses = App\Topic::find($id)->courses;
        
        return $this->morphMany('App\Ac_comment', 'commentable');
    }
}
