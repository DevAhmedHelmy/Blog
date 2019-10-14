@extends('site.layouts.app')

@section('header')
<!-- Page Header -->
<header class="masthead" style="background-image: url('img/home-bg.jpg')">
	<div class="overlay"></div>
	<div class="container">
	  <div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
		  <div class="site-heading">
			<h1>Clean Blog</h1>
			<span class="subheading">A Blog Theme by Start Bootstrap</span>
		  </div>
		</div>
	  </div>
	</div>
  </header>

@endsection
@section('content')
	
	@foreach($posts as $post)
		<div class="post-preview">
			<a href="{{route('post.show',['post'=>$post->id])}}">
			  	<h2 class="post-title">
					{{ $post->title }}
				</h2>
			</a>
			  	<p class="post-subtitle">
					{{ $post->body }}
				</p>
				<ul>
					@foreach ($post->tags as $tag)
					<li><a href="/filter/{{$tag->id}}">{{$tag->name}}</a></li>
					@endforeach
				</ul>
				
			
			<p class="post-meta">Posted by
			  <a href="#">{{ $post->user->name }}</a>
			  {{ $post->created_at }}</p>
	  	</div>
	  	<hr>
  	@endforeach
{{ $posts->links() }}
@endsection