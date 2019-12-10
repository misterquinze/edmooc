<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'tutor_id',
        'topic_id',
        'title',
        'description',
        'source',
        'type'
    ];

    public function tutor(){
        return $this->belongsTo('App\tutor');
    }

    public function topics(){
        return $this->belongsTo('App\topic');
    }
}
