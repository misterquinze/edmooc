<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'company_id',
        'name',
        'degree',
        'requirement',
    ];

    public function company(){
        return $this->belongsTo('App\company');
    }

    public function ac_course(){
        return $this->hasMany('App\ac_course');
    }
}
