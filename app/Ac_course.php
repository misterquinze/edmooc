<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ac_course extends Model
{
    protected $fillable = [
        'company_id',
        'category_id',
        'program_id',
        'tutor_id',
        'name',
        'description',
        'passing_grade',
        'price',
        'start_date',
        'end_date'
    ];

    public function company(){
        return $this->belongsTo('App\company');
    }

    public function program(){
        return $this->belongsTo('App\company');
    }

    public function tutor(){
        return $this->belongsTo('App\tutor');
    }

    public function category(){
        return $this->hasOne('App\category');
    }
    public function ac_topics(){
        //$courses = App\Topic::find($id)->courses;
        
        return $this->hasMany('App\ac_topic');
    }

}
