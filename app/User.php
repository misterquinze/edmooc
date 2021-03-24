<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function getUrlAttribute()
    // {
    //     return Storage::url("profile-photo}/{$this->photo}");
    // }

    public function tutor()
    {
        return $this->hasOne('App\Tutor');
    }

    public function enrollement()
    {
        return $this->hasMany('App\Enrollment');
    }

    public function ac_enrollement()
    {
        return $this->hasMany('App\Ac_enrollment');
    }

    public function userCourse()
    {
        return $this->hasMany('App\UserCourse');
    }

    public function discussion()
    {
        return $this->hasMany('App\discussion');
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

   

}
