
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
                <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/">V</a></li>

                @if(Auth::check() && (auth()->user()->admin === 1))
                  <li class=" {{ Request::is('projects.index') ? "active" : "" }} "><a href="/projects">Toate proiectele</a></li>

                @elseif(Auth::check()) 
                  <li class=" {{ Request::is('vapp.seeprojects') ? "active" : "" }} "><a href="/vapp">Proiecte propuse</a></li>
                @endif
                
                <li class="{{ Request::is('about') ? "active" : "" }}"><a href="/about">Despre</a></li>
                <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="/contact">Contact</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">

            @if (Auth::check()) 

              <li class="dropdown">
                  <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Hello {{ Auth::user()->name }} <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  {{-- <li><a href="{{ route('vapp.profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a></li> --}}
                    <li role="separator" class="divider"></li>
                    {{-- <li><a href=" {{ route('departments.index') }} ">Departamente</a></li> --}}
                    <li><a href=" {{ route('tags.index') }} ">Taguri</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                  </ul>
              </li>

              @else
                <li class="{{ Request::is('login') ? "active" : "" }}"><a href="/login" >Login</a></li>
                <li class="{{ Request::is('register') ? "active" : "" }}"><a href="/register" >Register</a></li>
            @endif

              </ul>

                <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="{{ route('vapp.seeprojects') }}"><img src="https://sitebooster-appsharp.netdna-ssl.com/i/56632c96839d1504447010fe/392db5bc86a440dba7aa46a3a958eb29/f=JPEG" width="75" height="75" align="center"><br></a>

                  <a href="#"><span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span></a>
                  <a href="{{ route('projects.index') }}"><span class="glyphicon glyphicon-home"  aria-hidden="true"></span>Toate proiectele </a>
                  
                  {{-- @if(auth()->user()->admin === 1)
                  <a href="#"><span class="glyphicon glyphicon-option-horizontal"  aria-hidden="true"></span></a>
                  <a href="#"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>Statistici asociatie</a>
                  @else --}}
                  <a href="#"><span class="glyphicon glyphicon-option-horizontal"  aria-hidden="true"></span></a>
                  <a href="{{ route('vpages.statistics') }}"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>Statistici personale</a>
                  {{-- @endif --}}
                </div>
            </div>
    </nav>