<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     *   belongs to tags
    */
    public function tags()
    {
       return $this->belongsToMany('App\Tag');
    }
}
