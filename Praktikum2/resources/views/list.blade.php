@extends('layouts.app')

@section('content')
<div class='container'>
        <h1 class='text-center'>Obrazci</h1>
        @if(count ($forms) > 0 )
            @foreach ($forms as $form)
                <div class="card card-body bg-light" padding = '3px'>
                    <h3><a href='/form/{{$form->id}}'>{{$form->form_name}}</a></h3>
                    <small>{{$form->form_data}}</small>
                </div>
            @endforeach
            
        @else
            <p>Ni objavljenih obrazcev</p>
        @endif
    </div>
@endsection