{{-- 
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><span class="glyphicon glyphicon-list" aria-hidden="true"></span></a>
            </div>
             <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                 	<li><a href="#"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> Despre</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Log Out</a></li>
                </ul>
                <form class="navbar-form navbar-right" action="#" method="GET">
               		<div class="input-group">
    					<input class="form-control" placeholder="Search..." id="query" name="search" value="" type="text">
                      	<div class="input-group-btn">
                        	<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
                      	</div>
    				</div>
                </form>
            </div> 
        </div>
</nav>

    <div id="wrapper" class="toggled">
        <div class="container-fluid">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                  	<li class="sidebar-brand">
                        <br>
                    </li>
                    <li class="sidebar-brand">
                        <a href="#" class="navbar-brand">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Profil
                        </a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                    </li>
                     
                    {{-- <li>
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span><font color="#337AB7"> STATISTICS</font>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Reports</a>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> Statistic</a>
                    </li>
                    <li>
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span><font color="#337AB7"> ADMINISTRATION</font>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users</a>
                    </li>
                  	<li>
                        <a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Messages</a>
                    </li> 
                </ul>
            </div>
        </div>
    </div>
            <!-- /#sidebar-wrapper -->

 @section('scripts')
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
@stop  --}}

{{-- <div class="container"> --}}
    <nav class="navbar navbar-custom navbar-static-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-exapnded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            @if (Auth::check())
             <span style="font-size:30px;cursor:pointer;padding-left: 10px;padding-top: 3px" onclick="openNav()">&#9776; </span>
            @else
            <span class="icon-bar"></span>
            @endif
             <a class="navbar-brand" href="#">Manage V</a> 
          </div>
          
          <div class="collapse navbar-collapse" id=".navbar-collapse">
            <ul class="nav navbar-nav">
              <li class="{{-- {{ Request::is('/') ? "active" : "" }} --}}"><a href="/">V</a></li>
              <li class=" {{ Request::is('projects.index') ? "active" : "" }} "><a href="/projects">Proiecte</a></li>
              <li class="{{-- {{ Request::is('about') ? "active" : "" }} --}}"><a href="/about">Despre</a></li>
              <li class="{{-- {{ Request::is('contact') ? "active" : "" }} --}}"><a href="/contact">Contact</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

           @if (Auth::check()) 

            <li class="dropdown">
                <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                Hello {{ Auth::user()->name }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                {{-- <li><a href="{{ route('vapp.profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li> --}}
                  <li role="separator" class="divider"></li>
                  <li><a href=" {{ route('departments.index') }} ">Departamente</a></li>
                  {{-- <li><a href=" {{ route('tasks.index') }} ">Tasks</a></li> --}}
                  <li role="separator" class="divider"></li>
                  <li><a href="{{ route('logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
              </li>

            @else
              <a href="{{ route('login') }}" class="btn btn-success">Login</a>
            @endif

            </ul>

              <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="{{ route('vapp.seeprojects') }}"><img src="https://sitebooster-appsharp.netdna-ssl.com/i/56632c96839d1504447010fe/392db5bc86a440dba7aa46a3a958eb29/f=JPEG" width="75" height="75" align="center"><br></a>
                <a href="#"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></a>
                
                <a href="{{ route('projects.index') }}"><span class="glyphicon glyphicon-home" align="center" aria-hidden="true"></span>Proiecte propuse</a>
                <a href="#"><span class="glyphicon glyphicon-option-horizontal"  aria-hidden="true"></span></a>
                <a href="#"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Contact</a>
              </div>
            </div>
    </nav>