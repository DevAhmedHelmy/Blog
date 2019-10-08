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
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
                </div>
            </div>
        </div>
  </header>
@endsection

@section('content')
    <form name="sentMessage" id="contactForm" action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Category Name</label>
            <input type="text" class="form-control" name="name" placeholder="Category Name" id="title" required data-validation-required-message="Please enter your Title.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
         
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Save</button>
        </div>
    </form>
     
    @if(count($categories)>0)
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No Categories Found</p>
    @endif
@endsection