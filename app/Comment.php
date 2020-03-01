<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'user_id',
        'disc_id',
        'content'
    ];

    public function discussion(){
       //$comments = App\Discussion::find($id)->discussions;
       
        return $this->belongsTo('App\Discussion', 'foreign_key');

    }

    public function user(){

        return $this->belongsTo('App\User', 'foreign_key');
    }
}
