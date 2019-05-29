@extends('layouts.mainLayout')


@section('content')

<head>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script src={{URL::to('vendor/parsley/parsley.min.js')}}></script>
    <script src={{URL::to('vendor/parsley/validatorji.js')}}></script>
</head>

<body>

<div class='container'>
    <div>
        
    </div>

    <div>
    
    </div>

    <form action="{{ route('formWizardGenerated', ['id' => $form]) }}" method="POST" type="hidden" name="_token" enctype="multipart/form-data"  data-parsley-validate="">{{ csrf_field() }}
        {!! $generatedHTMLOutput !!}
        <input type="submit" value="Send" class="btn waves-effect waves-light" class="btn waves-effect waves-light">
    </form>
    
    </div>
    
</body>
@endsection



