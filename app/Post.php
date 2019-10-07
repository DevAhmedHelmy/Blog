<?php

namespace App;

use App\User;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /**
     *   belongs to tags
    */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function tags()
    {
       return $this->belongsToMany('App\Tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->belongsToMany('App\Like');
    }

   
}
