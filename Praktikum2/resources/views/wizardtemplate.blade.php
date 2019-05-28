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


    <label for="email">Email * :</label>
    <input type="text" class="form-control" name="s" required="" data-parsley-palindrome-jao="">
    
    <label for="question">test</label>
    <input type="text" class="form-control" name="nb" required="" data-parsley-zmazek="10">

    <input type="submit" class="btn btn-default" value="validate">

    
    </form>


@endsection



