@extends('layouts.mainLayout')

@section('content')

<div class='container'>
    <div>
        <h1>{{$form->form_name}}</h1>
    </div>

    <div>
        {!! $form->form_data !!}
    </div>

    <a href="/form/{{$form->id}}/wizard" class="btn btn-primary">Izpolni obrazec {{$form->form_name}}</a>
</div>
@endsection


