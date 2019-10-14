<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'company_id',
        'category_id',
        'tutor_id',
        'name',
        'description',
        'type',
        'price',
        'start_date',
        'end_date'
    ];

    public function company(){
        return $this->belongsTo('App\company');
    }

    public function category(){
        return $this->hasOne('App\category');
    }

    public function tutor(){
        return $this->belongsTo('App\tutor');
    }

    public function topic(){
        return $this->hasMany('App\topic');
    }

    public function enrollment()
    {
        return $this->hasMany('App\Enrollment');
    }

    public function userCourse()
    {
        return $this->hasMany('App\UserCourse');
    }

}
