@extends('site.layouts.app')


@section('header')
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('/en/img/home-bg.jpg')">
        <div class="overlay"></div>
            <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap Views {{ $views }} Nubmer</span>
                </div>
                </div>
            </div>
        </div>
  </header>
@endsection

@section('content')

<article>
    <img class="img-fluid" src="{{$post->image}}" alt="">
    <h2 class="section-heading">{{$post->title}}</h2>
    <h6 class="mt-0 mb-1">Post By : {{$post->user->name}} at {{$post->created_at}}</h6>
    <p>{{$post->body}}</p>

</article>
<hr>
<div>
    <div class="panel panel-info">
        <div class="panel-heading">
            Comment 
        </div>
        <div class="panel-body">
        <form action="{{route('comment.store')}}" method="POST">
            @csrf
            <input class="form-control" type="hidden" value="{{$post->id}}" name="post_id">
            <textarea class="form-control" name="comment" placeholder="write a comment..." rows="3"></textarea>
            <br>
            <button type="submit" class="btn btn-info pull-right">Post</button>
            <div class="clearfix"></div>
            <hr>
        </form>
           
        </div>
    </div>
</div>
<div>
    <div class="card">
        <div class="card-header">
            All Comments <small>{{$post->comments()->count()}}</small>
        </div>
        <div class="card-body">
            @if($post->comments()->count() > 0)
                <ul class="list-unstyled">
                    @foreach($post->comments as $comment)
                     
                    <li class="media mt-4">
                        <img src="..." class="mr-3" alt="...">
                        <div class="media-body">
                        <h5 class="mt-0 mb-1">{{$comment->user->name}}</h5>
                        {{$comment->comment}}
                    </li>  
                    @endforeach 
                </ul>

            @else
                <h1>No Comments</h1>
            @endif
        </div>
    </div>
</div>


@endsection