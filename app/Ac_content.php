<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ac_content extends Model
{
    //
    protected $fillable = [
        'tutor_id',
        'ac_topic_id',
        'title',
        'description',
        'type',
        'source'
        
        
    ];

    public function tutor()
    {
        return $this->belongsTo('App\tutor');
    }

    public function ac_topic()
    {
        return $this->belongsTo('App\ac_topic');
    }
}
