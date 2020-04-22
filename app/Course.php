<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Favorite;


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
        'status',
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

    public function topics(){
        //$courses = App\Topic::find($id)->courses;
        
        return $this->hasMany('App\topic');
    }

    public function discussions(){
        //$courses = App\Topic::find($id)->courses;
        
        return $this->hasMany('App\discussion');
    }

    public function enrollment()
    {
        return $this->hasMany('App\Enrollment');
    }

    public function userCourse()
    {
        return $this->hasMany('App\UserCourse');
    }

    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
                            ->where('course_id', $this->id)
                            ->first();

                      
    }
    
    public function favorite()
    {
        return $this->belongsToMany(Course::class, 'favorites', 'user_id', 'course_id')->withTimeStamps();
    }

}
