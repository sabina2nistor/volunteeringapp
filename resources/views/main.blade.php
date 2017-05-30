<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials/_head')
</head>

<body >
      
        
    
    <div id="app">
        
        <div id="page-content-wrapper" >

            
        <!-- Navbar and sidebar -->

             @include('partials/_navsidebar')  

             @include('partials/_messages') 

             @yield('container')

             @include('partials/_footer')    

           
        </div>
        <!-- end of .container -->
    </div>
    @include('partials/_javascripts')
     {{-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>  --}}
    @yield('scripts')

  </body>

</html>