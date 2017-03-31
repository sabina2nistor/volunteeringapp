<!DOCTYPE html>
<html lang="en">

<head>
  @include('partials/_head')
</head>

<body>
      
        <!-- Navbar and sidebar -->
        
    
    
        <div id="page-content-wrapper" >

            

             @include('partials/_navsidebar')  

             @include('partials/_messages') 

             @yield('container')

             @include('partials/_footer')    

           
        </div>
        <!-- end of .container -->
    @include('partials/_javascripts') 
    @yield('scripts')

  </body>

</html>