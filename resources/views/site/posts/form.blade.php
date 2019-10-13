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
     
    <form name="sentMessage" id="contactForm" action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title" id="title"  data-validation-required-message="Please enter your Title.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Body</label>
            <textarea rows="5" class="form-control" placeholder="Body" name="body" id="body"  data-validation-required-message="Please enter a Body."></textarea>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
            
            <label>Categories</label>
                <select class="form-control" name="category_id">
                    <option>Choose Category</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            <p class="help-block text-danger"></p>
            
            </div>
            <div class="control-group">
            
                <label class="text-white mb-3 lead">Tags</label>
                <!-- Multiselect dropdown -->
                <select name="tags[]" multiple data-style="bg-white rounded-pill px-4 py-3 shadow-sm" class="selectpicker form-control">
                    <option>Choose Tags</option>
                    @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->name}}</option>
                    @endforeach
                </select><!-- End -->
                <p class="help-block text-danger"></p>
                
            </div>
        <div class="form-group">
            
            <label for="image">Upload Image (optional)</label>
            <input type="file" name="image" class="form-control-file image" id="image">
        </div>
        <div class="form-group">
                <img src="{{ asset('uploads/posts/default.png') }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
            </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Save</button>
        </div>
    </form>
@endsection
@section('js')
    <script>
        $(".image").change(function () {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });
        $(function () {
    $('.selectpicker').selectpicker();
});
    </script>    
@endsection