<?php

namespace App;



class Tag extends Model
{
    public function posts()
    {
       return $this->belongsToMany('App\Post');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
