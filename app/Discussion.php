<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'title',
        'content'
    ];

    public function course($id){
        $discussions = App\Course::find($id)->discussions;
       
        return $this->belongsTo('App\course', 'foreign_key');

    }

    public function user(){

        return $this->belongsTo('App\user', 'foreign_key');
    }
}
