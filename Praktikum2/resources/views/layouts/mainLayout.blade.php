<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <!-- Css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
        <link rel="stylesheet" href="{{asset('css/hover-min.css')}}"> 
        <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="{{asset('js/jquery.js')}}"></script>
        
    </head>
    <body>
                
        <div id="content">

        
        @if(Auth::check())
            <ul id="slide-out" class="sidenav"><!-- USER NAVBAR -->
                <li>
                    <div class="user-view">
                        <div class="background">
                    
                        </div>
                        <i class="large material-icons white-text">account_circle</i>
                        <a><span class="white-text name ff-poppins"><h5>{{ Auth::user()->name }}</h5></span></a>
                        <a><span class="white-text email"><h6>{{ Auth::user()->email }}<h6></span></a>
                    </div>
                </li>
                <li><a class="subheader">User</a></li>
                <li><a href="{{ route('userIndex') }}" class="hvr-glow"><i class="material-icons">settings</i>User Settings</a></li>
                <li><a href="{{ route('userFormIndex') }}" class="hvr-glow"><i class="material-icons ">folder</i>My Templates</a></li>
                <li><div class="divider"></div></li>
                <li><a class="subheader">Logout</a></li>
                <li>
                    <a class="waves-effect hvr-glow" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="material-icons">exit_to_app</i>Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
            </ul>

            <div class="fixed-action-btn">
                <a class="btn-floating btn-large scale-transition sidenav-trigger bgStill tooltipped animated bounceInUp delay-1s " style="background-color:#08aeea" data-position="left" data-tooltip="Open profile" data-target="slide-out">
                    <i class="large material-icons white-text">account_circle</i>
                </a>
            </div>
        @endif

            <nav class=""><!-- MAIN NAVBAR -->
                <div class="nav-wrapper ">
                    <a href="{{ route('home') }}" class="brand-logo">Smart Forms</a>
                    <ul class="right hide-on-med-and-down" >
                        <li><a href="{{ route('formCreate') }}"><i class="material-icons left ">mode_edit</i>Create</a></li>
                        <li><a href="{{ route('formIndex')}}" ><i class="material-icons left ">insert_drive_file</i>Templates</a></li>
                        
                    @guest
                        <li style="background-color:white;width:0.04em;height:3em;margin-top:0.5em;margin-right:0.4em;margin-left:0.4em;">

                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('login') }}"><i class=" material-icons left" style="font-size:2em;">person</i>Sign in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="">
                                <a class="nav-link" href="{{ route('register') }}"><i class=" material-icons left" style="font-size:2em;">person_add</i>Sign up</a>
                            </li>
                        @endif
                    @else 
                    
                    @endguest
                    </ul>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                </div>

                <ul class="sidenav" id="mobile-demo"><!-- MOBILE NAVBAR -->
                        <li><a href="{{ route('formCreate') }}" class="hvr-glow"><i class="material-icons left">mode_edit</i>Create</a></li>
                        <li><a href="{{ route('formIndex')}}" class="hvr-glow"><i class="material-icons left">insert_drive_file</i>Templates</a></li>
                    @guest
                        <div class="divider" style="margin:0;"></div>
                        <li id="login">
                            <a class="hvr-glow" href="{{ route('login') }}"><i class=" material-icons left" style="font-size:2em;">person</i>Sign in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="">
                                <a class="hvr-glow" href="{{ route('register') }}"><i class=" material-icons left" style="font-size:2em;">person_add</i>Sign up</a>
                            </li>
                        @endif
                    @else 
                        <li id="login">
                            <a class="hvr-glow" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        </li>
                    @endguest
                </ul>
            </nav>
            
            <div class="ff-opensans">
                @yield('content')
            </div>       
            </div>
            <div id="loader">
                <div class="container ">
                    <div class="row ">
                        <div class="col l4 offset-l4">
                            <div class="progress white">
                                <div class="indeterminate" style="background-color:#08aeea"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    </body>
    
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
    $('.tooltipped').tooltip();
    $('.collapsible').collapsible();
    $('select').formSelect();
    $('.parallax').parallax();
  });

  $(window).on('load',function(){
      $("#loader").fadeOut("slow");
  })
    </script>

</html>
