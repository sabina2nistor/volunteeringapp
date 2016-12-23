<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials/_head')
</head>

<body>
    {{-- @include('partials/_nav') --}}
        <!-- Default Bootstrap Navbar -->
        

        <div class="container">

         @include('partials/_messages') 

         @yield('container')

         @include('partials/_footer')    


        </div>
        <!-- end of .container -->
    @include('partials/_javascripts') 
    @yield('scripts')

  </body>

</html>