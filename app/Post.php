<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // connection to user

    protected $guarded = [];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
}
