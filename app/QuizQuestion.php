<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizQuestion extends Model
{
    protected $fillable = [
        'topic_id',
        'questions',
        'type'
    ];

    public function topic(){
        return $this->belongsTo('App\Topic');
    }

    public function options(){
        return $this->hasMany('App\QuizOption');
    }
}
