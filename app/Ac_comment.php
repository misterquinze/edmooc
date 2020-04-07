<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ac_comment extends Model
{
    //
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {

        return $this->belongsTo('App\User', 'foreign_key');
    }

    public function ac_comments()
    {
        
        return $this->morphMany('App\Ac_comment', 'commentable');
    }
}
