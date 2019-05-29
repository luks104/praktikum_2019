@extends('layouts.mainLayout')

@section('content')

<h1>Ime obrazca: {{$form->form_name}}</h1><br>
{!! $data !!}

@endsection