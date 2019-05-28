@extends('layouts.mainLayout')

@section('content')
<div class='container'>
        <div>
            <h3 class="ff-poppins" style="text-transform:uppercase;">Templates</h3>
        </div>
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