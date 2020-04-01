<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user(){

        return $this->belongsTo('App\User', 'foreign_key');
    }

    public function comments(){
        //$courses = App\Topic::find($id)->courses;
        
        return $this->morphMany('App\Comment', 'commentable');
    }
}
