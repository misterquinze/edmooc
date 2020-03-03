<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ac_course extends Model
{
    protected $fillable = [
        'company_id',
        'category_id',
        'program_id',
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

    public function category(){
        return $this->hasOne('App\category');
    }
}
