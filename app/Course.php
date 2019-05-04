<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'company_id',
        'category_id',
        'name',
        'description',
        'type',
        'start_date',
        'end_date'
    ];
}
