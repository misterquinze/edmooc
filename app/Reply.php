<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $fillable = [
        'user_id',
        'comment_id',
        'content'
    ];

    public function comment(){
        //$replies = App\Comment::find($id)->comment;
       
        return $this->belongsTo('App\Comment', 'foreign_key');

    }

    public function user(){

        return $this->belongsTo('App\User', 'foreign_key');
    }
}
