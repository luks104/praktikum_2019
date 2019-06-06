@extends('layouts.mainLayout')


@section('content')

<head>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <script src={{URL::to('vendor/parsley/parsley.min.js')}}></script>
    <script src={{URL::to('vendor/parsley/validators.js')}}></script>
</head>

<body>

<div class='container'>
    <div style="height:3em;">
        
    </div>

    <form action="{{ route('formWizardGenerated', ['id' => $form]) }}" method="POST" type="hidden" name="_token" enctype="multipart/form-data"  data-parsley-validate="">{{ csrf_field() }}
        <div class="container">
            <div class="row">
                <div class="col l10 offset-l1 m10 offset-m1 s10 offset-s1">
                    <div class="card-panel">
                        {!! $generatedHTMLOutput !!}
                        <br>
                        <div class="row">
                            <div class="col l6 m8 s10 offset-l3 offset-m2 offset-s1">
                                    <button type="submit" class="btn waves-effect btn-large waves-light bgStill " style="width:100%">Finish</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
    
    </div>
    
</body>
@endsection



