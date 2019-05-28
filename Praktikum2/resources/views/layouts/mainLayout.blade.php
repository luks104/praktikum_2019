<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <!-- Css -->
        <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        
    </head>
    <body>
        
        <div id="content">

        
        @if(Auth::check())
            <ul id="slide-out" class="sidenav"><!-- USER NAVBAR -->
                <li>
                    <div class="user-view">
                        <div class="background" style="background-color:#8EC5FC">
                    
                        </div>
                        <a href="#user"><img class="circle" src="https://materializecss.com/images/yuna.jpg"></a>
                        <a><span class="white-text name ff-poppins"><h5>{{ Auth::user()->name }}</h5></span></a>
                        <a><span class="white-text email"><h6>{{ Auth::user()->email }}<h6></span></a>
                    </div>
                </li>
                <li><a class="subheader">User</a></li>
                <li><a href="#!"><i class="material-icons">settings</i>User Settings</a></li>
                <li><a href="#!"><i class="material-icons">folder</i>My Templates</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Subheader</a></li>
                <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Logout</a></li>
                <li>
                    <a class="waves-effect" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
            </ul>

            <div class="fixed-action-btn">
                <a class="btn-floating btn-large white sidenav-trigger " data-target="slide-out">
                    <i class="large material-icons" style="background-color:#E0C3FC">account_circle</i>
                </a>
            </div>
        @endif

            <nav><!-- MAIN NAVBAR -->
                <div class="nav-wrapper blue">
                    <a href="{{ route('home') }}" class="brand-logo">Smart Forms</a>
                    <ul class="right hide-on-med-and-down">
                        <li><a href="{{ route('formCreate') }}">Create</a></li>
                        <li><a href="{{ route('formList')}}">Templates</a></li>
                        
                    @guest
                        <li id="login">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @else 
                    
                    @endguest
                    </ul>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </div>

                <ul class="sidenav" id="mobile-demo"><!-- MOBILE NAVBAR -->
                        <li><a href="{{ route('formCreate') }}">Create</a></li>
                        <li><a href="{{ route('formList')}}">Templates</a></li>
                    @guest
                        <li id="login">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @else 
                        <li id="login">
                            <a class="dropdown-item" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </li>
                    @endguest
                </ul>
            </nav>        
                @yield('content')
            </div>
            <div id="loader">
                    <div class="preloader-wrapper big active">
                            <div class="spinner-layer spinner-blue-only">
                              <div class="circle-clipper left">
                                <div class="circle"></div>
                              </div><div class="gap-patch">
                                <div class="circle"></div>
                              </div><div class="circle-clipper right">
                                <div class="circle"></div>
                              </div>
                            </div>
                          </div>
            </div>
        
    </body>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('js/materialize.js')}}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var options = {
        "edge" : "left"
    };
    var instances = M.Sidenav.init(elems, options);
  });

  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

  // Or with jQuery


  $(document).ready(function(){
    $('.sidenav').sidenav();
    $('.modal').modal();
  });

  $(window).on('load',function(){
      $("#loader").fadeOut("slow");
  })
    </script>

</html>
