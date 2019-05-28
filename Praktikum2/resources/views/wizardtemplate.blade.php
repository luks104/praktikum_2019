@extends('layouts.app')

@section('content')
<head>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src={{URL::to('vendor/parsley/parsley.min.js')}}></script>
<script src={{URL::to('vendor/parsley/validatorji.js')}}></script>


</head>

<div class="col-lg-2">
</div>
<div class="col-lg-8">
    <form id="demo-form" data-parsley-validate="" >


    {!! $generatedHTMLOutput !!}

    <input type="submit" class="" required="" value="validate">
    </form>


@endsection



