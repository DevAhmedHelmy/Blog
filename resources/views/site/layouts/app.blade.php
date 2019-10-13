<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clean Blog - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('en/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('en/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="{{ asset('en/css/clean-blog.min.css') }}" rel="stylesheet">
  <link href="{{ asset('en/css/bootstrap-select.min.css') }}" rel="stylesheet">

</head>

<body>

 @include('site.layouts.nav')

  @yield('header')

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-md-8">
          @include('site.layouts._message')
          @yield('content')
        
         
         
        {{--  
        <hr>
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div> --}}

      
    </div>
    <div class="col-md-4">
            @include('site.layouts.sidebar')
      </div>
  </div>
</div>

  <hr>

  @include('site.layouts.footer')

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('en/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('en/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="">{{ asset('en/js/clean-blog.min.js') }}</script>
<script src="{{asset('en/js/bootstrap-select.min.js')}}"></script>


  @yield('js')
</body>

</html>