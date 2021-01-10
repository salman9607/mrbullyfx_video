<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Videos</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('public/js/app.js') }}" defer></script> -->
    <!--<script src="{{ asset('public/js/jquery.min.js') }}" defer></script>-->
    <!--<script src="{{ asset('public/js/bootstrap.bundle.min.js') }}" defer></script>-->
    <!--<script src="{{ asset('public/js/owl.carousel.js') }}" defer></script>-->
    <!--<script src="{{ asset('public/js/custom.js') }}" defer></script>-->
    
    <!-- Scripts -->
    <!-- <script src="{{ asset('public/js/app.js') }}" defer></script> -->

<!--     <script src="{{ asset('public/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('public/js/owl.carousel.js') }}" defer></script>
    <script src="{{ asset('public/js/custom.js') }}" defer></script>
    <script src="{{ asset('public/js/bootstrap.bundle.min.js') }}" defer></script> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <!--<link href="{{ asset('css/osahan.css') }}" rel="stylesheet">-->
    <!--<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet">-->
    <!--<link href="{{ asset('css/owl.theme.css') }}" rel="stylesheet">-->
    
    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/osahan.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/owl.theme.css') }}" rel="stylesheet">
    <link href="{{ asset('public/css/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

      <!-- Sidebar -->

      @if (Request::route()->getName() != "login" && Request::route()->getName() != "register")
      
          
      @include('inc.nav')
      <div id="wrapper">
         @else
         <div id="app">
      @endif

         <!-- Sidebar -->
         @if (Request::route()->getName() != "login" && Request::route()->getName() != "register")
         @include('inc.sidebar')
      
          
         @endif
   

        {{-- content --}}
        @yield('content')
        {{-- content --}}
      </div> <!-- /.content-wrapper -->


       
    </div>
    @if (Request::route()->getName() != "login" && Request::route()->getName() != "register")

    <footer class="sticky-footer">
       <div class="container">
          <div class="row no-gutters">
             <div class="col-lg-6 col-sm-6">
                <p class="mt-1 mb-0"><strong class="text-dark">&copy; Copyright ShootTube. All Rights Reserved</strong>.
                </p>
             </div>
             <div class="col-lg-6 col-sm-6 text-right">
                <div class="app">
                   <a href="#"><img alt="" src="{{ asset('public/img/google.png') }}"></a>
                   <a href="#"><img alt="" src="{{ asset('public/img/apple.png') }}"></a>
                </div>
             </div>
          </div>
       </div>
    </footer>
@endif


    <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script>
      $(function(){
   $("#sidebarToggle").click();
   })
   </script>
    <script src="{{ asset('public/js/jquery.min.js') }}" defer></script>
    <script src="{{ asset('public/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('public/js/owl.carousel.js') }}" defer></script>
    <script src="https://cdn.plyr.io/3.5.6/plyr.js"></script>
    <script src="{{ asset('public/js/custom.js') }}" defer></script>
@yield('content_js')




</body>
</html>
