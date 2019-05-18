
@extends('layouts.app')

@section('content')


<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src='https://cloud.tinymce.com/5/tinymce.min.js?apiKey=u10v0g64egvz9bbbguv1pg14x0au3nus6yzv88vhiwbfwd8v'></script>

    <script>
    tinymce.init({
        selector: '#mytextarea'
    });
    </script>

    <title>main</title>
</head>

    <body>
    <div style="height: 100px">
    
    </div>
    <div class="row" style="height: 500px">
        <div class="col-lg-2">

    
        </div>
        <div class="col-lg-8">
        <form method="post">
            <textarea id="mytextarea">Hello, World!</textarea>
            <button type="button" class="btn btn-primary">Primary</button>
        </form>
    
        </div>
        <div class="col-lg-2">


        </div>
    </div>
    
    
    </body>
    @endsection
</html>



