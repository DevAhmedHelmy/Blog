<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    
    public function index()
    {
        \DB::connection()->enableQueryLog();
        $post = new Post();
        $posts = $post->getall();
        $log = \DB::getQueryLog();
       
        return view('site.home.index',compact('posts'));
    }
}
