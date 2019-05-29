@extends('layouts.app')

@section('content')

<head>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script src={{URL::to('vendor/parsley/parsley.min.js')}}></script>
    <script src={{URL::to('vendor/parsley/validatorji.js')}}></script>
</head>

<body>
    Ime forme: {{$form->form_name}}
    <form action="{{ route('formWizardGenerated', ['id' => $form->id]) }}" method="POST" type="hidden" name="_token" enctype="multipart/form-data" data-parsley-validate="">{{ csrf_field() }}
        {!! $generatedHTMLOutput !!}
        <input type="submit" value="OK">
    </form>
</body>
@endsection



