<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizOption extends Model
{
    protected $fillable = [
        'quiz_question_id',
        'option'
    ];

    public function question(){
        return $this->belongsTo('App\QuizQuestion', 'quiz_question_id');
    }
}
