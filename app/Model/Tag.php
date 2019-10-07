<?php

namespace App\Model;



class Tag extends Model
{
    public function posts()
    {
       return $this->belongsToMany('App\Post');
    }
}
