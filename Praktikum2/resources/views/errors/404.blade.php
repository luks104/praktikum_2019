<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
        <!-- Css -->
        <link rel="stylesheet" href="{{asset('css/hover-min.css')}}"> 
        <link rel="stylesheet" href="{{asset('css/materialize.css')}}">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        
    </head>
    <style>
        
    </style>

    <body>
        <div style="height:100vh" class="valign-wrapper">
            <div class="row">
                <div class="col l12  s12 center-align">
                        <h4 class="">You seem a bit lost.</h4>
                    <a href="{{route('home')}}" class="btn waves-effect btn-large blue ">GO HOME</a>
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
    $('.tooltipped').tooltip();
    $('.collapsible').collapsible();
  });

  $(window).on('load',function(){
      $("#loader").fadeOut("slow");
  })
    </script>

</html>
