<?php

namespace App;

use App\User;
use Cache;
use Illuminate\Support\Facades\Redis;
class Post extends Model
{

    public $storage;

    public function __construct()
    {
        $this->storage = Redis::connection();
    }

    // to get all data from database
    public function getall()
    {
        $result = Cache::remember('post_blog_cache', 1, function () {
            return Post::paginate(5);
            // return \DB::table('posts')->paginate(5);
        });
        return $result;
    }

    // to show 

    public function fetch($id)
    {
        $this->id = $id;
         
        
        $this->storage->pipeline(function($pipe){
            $pipe->zIncrBy('postViews',1,'post:'.$this->id);
            $pipe->incr('post:'.$this->id.':views');
        });
            
       return $this->where('id',$id)->first();
    }

    // to view count of post views
    public function getViews($id)
    {
        $views = $this->storage->get('post:'.$id.':views');
        return $views;
    }


    

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

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month' )->groupBY('year' , 'month')->orderByRaw('min(created_at) desc')->get()->toArray();
    }




   
}
