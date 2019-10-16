<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Redis;
use App\Repositories\Contracts\PostRepositoryInterface;
class HomeController extends Controller
{
    
    
    public function index()
    {

        \DB::connection()->enableQueryLog();
        $post = new Post();
        $posts = $post->getall();
        $log = \DB::getQueryLog();
        
        $redis = Redis::connection();

        $popular = $redis->zRevRange('postViews',0,1);

        
        foreach ($popular as $value) {
            $id = str_replace('post:', '', $value);
            // echo $id;
        }


        return view('site.home.index',compact('posts'));
    }
}
