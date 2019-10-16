<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Repositories\Contracts\PostRepositoryInterface;
class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $postRepository;
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
        $this->middleware('auth')->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         

        $posts = $this->postRepository->getAll();

       
          
        return view('site.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('site.posts/form',compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validate
        $this->validate($request,array(
            'title'=>'required|string|max:255',
            'body'=>'required',
            'category_id'=>'required|integer',
            'image'=>'sometimes|image',
            
            
        ));
        $post = new Post();
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->body = $request->body;
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->category_id;
        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/posts/' . $request->image->hashName()));

                $post->image= $request->image->hashName();

        }//end of if

        $post->save();

        if($request->tags)
        {
            foreach ($request->tags as $tag) {
                Redis::zadd('post:tag'. $tag , $post->id,$post->id);
                Redis::sadd('post'.$post->id, ':tag'.$tag);
                Redis::sadd('post:tags',$tag);
            }
        }
        // $post->tags()->sync($request->tags,FALSE);//wheter to override the extisting association

        // Session::flash('success','The blog post was successfully save!');
        return redirect('/')->with('success','The blog post was successfully save!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return $post->getViews($post->id);
        // $id = $post->id;
        // $this->post = $post;
        // $storage = Redis::connection();
        // if($storage->zScore('postViews','post:'.$this->post))
        // {
        //     $storage->pipeline(function($pipe){
        //         $pipe->zIncrBy('postViews',1,'post:'.$this->post);
        //         $pipe->incr('post:'.$this->post.':views');
        //     });
            
        // }else {
        //     $views = $storage->incr('post:'.$this->post.':views');
        //     $storage->zIncrBy('postViews',$views,'post:'.$this->post);
            
        // }
        
        // $views = $storage->get('post:'.$this->post.':views');
        // return $views;

        
        // $this->post = $post;
        // 
        // if($storage->zScore('postViews','post:'.$post)){
        //     $storage->pipline(function($pipe){
        //         $pipe->zIncrBy('postViews',1,'post'.$this->post);
        //         $pipe->incr('post:'.$this->post.':views');
        //     });
            
        // }else{
        //     $views = $storage->incr('post:'.$this->post.':views');
        //     $storage->zIncrBy('postViews',$views,'post'.$this->post);
        // }
        // $views = $storage->get('post:'.$this->post.':views');
        // return $views;
        // if($post)
        // {
        //     $views = Redis::pipeline(function($pipe) use ($post) {
        //         $pipe->zIncrBy('postViews',1,'post'.$post);
        //         $pipe->incr('post:'.$post.':views');
        //     });
          
        //     $views = $views['1'];
        //     $tags = Redis::sMembers('post:'.$post.':tags');
        //     return $tags;
        
        // }
        
        
        
        return  view('site.posts/show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //$post->tags()->sync($request->tags);//wheter to override the extisting association //2ns param default TRUE
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    
}
