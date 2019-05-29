@extends('layouts.mainLayout')

@section('content')

<div class='container'>
    <div>
        <h1>{{$form->form_name}}</h1>
    </div>

    <div>
        {!! $form->form_data !!}
    </div>

<<<<<<< HEAD
    <a href="{{ route('formWizard') }}" class="btn btn-primary">Izpolni obrazec {{$form->form_name}}</a>
=======
    <a href="/form/{{$form->id}}/wizard" class="btn btn-primary">Izpolni obrazec {{$form->form_name}}</a>
>>>>>>> 5cea98e58a718feebc011f15408aac6f705b9984
    <a href="/form/{{$form->id}}/formToPDF" class="btn btn-primary">pretvori v PDF {{$form->form_name}}</a>
    
</div>
@endsection


