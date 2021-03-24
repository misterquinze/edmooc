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
        'status',
        'start_date',
        'end_date'
    ];

    public function company()
    {
        return $this->belongsTo('App\company');
    }

    public function program()
    {
        return $this->belongsTo('App\program');
    }

    public function tutor()
    {
        return $this->belongsTo('App\tutor');
    }

    public function category()
    {
        return $this->hasOne('App\category');
    }
    public function ac_topic()
    {
        
        return $this->hasMany('App\ac_topic');
    }

    public function ac_discussion()
    {
        return $this->hasMany('App\ac_discussion');
    }

    public function ac_enrollment()
    {
        return $this->hasMany('App\ac_enrollment');
    }


}
