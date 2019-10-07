<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
class HomeController extends Controller
{
    public function index()
    {
    	$posts = Post::paginate(5);

        return view('site.home.index',compact('posts'));
    }
}
