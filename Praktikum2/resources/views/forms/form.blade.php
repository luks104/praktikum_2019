@extends('layouts.mainLayout')

@section('content')

<div class='container'>
    <div>
        <h1>{{$form->form_name}}</h1>
    </div>

    <div>
        {!! $form->form_data !!}
    </div>

    <a href="{{ route('formWizard', ['id' => $form->id]) }}" class="btn btn-primary">Izpolni obrazec {{$form->form_name}}</a>
    <a href="/form/{{$form->id}}/formToPDF" class="btn btn-primary">pretvori v PDF {{$form->form_name}}</a>
    <!--<a href="{{ route('formToDocx', ['id' => $form->id]) }}" class="btn btn-primary">Pretvori v word datoteko {{$form->form_name}}</a>-->
    
    
</div>
@endsection


