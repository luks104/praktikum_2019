@extends('layouts.mainLayout')

@section('content')

<div class='row'>
    <div class="col s1"></div>
    <div class="col s5">
        <h1>{{$form->form_name}}</h1>
        <font color="black"><h4>Required information:</h4></font>

        <h6>{!!$data!!}</h6>
        <a href="{{ route('formWizard', ['id' => $form->id]) }}" class="btn btn-primary">Fill the form "{{$form->form_name}}"</a>
    </div>

    <div class="col s5" id="1" style=" padding-top: 30px;">

   
    </div>
    <div class="col s1"></div>
</div>


 
    <!--<a href="{{ route('formToDocx', ['id' => $form->id]) }}" class="btn btn-primary">Pretvori v word datoteko {{$form->form_name}}</a>-->
    








<script>
  var encodedPDF = {!! json_encode($encodedPDF) !!};
       /*
        var decodedPdfContent = atob(base64EncodedPDF);
        var byteArray = new Uint8Array(decodedPdfContent.length)
        for(var i=0; i<decodedPdfContent.length; i++){
            byteArray[i] = decodedPdfContent.charCodeAt(i);
        }
        var blob = new Blob([byteArray.buffer], { type: 'application/pdf' });
        var _pdfurl = URL.createObjectURL(blob);
        console.log(blob);
        document.querySelector("iframe").data = blob;*/
        var encodedPDF = {!! json_encode($encodedPDF) !!};
        var base64EncodedPDF = {!! json_encode($encodedPDF) !!}; 
        var PDFdisplay = "<iframe width='100%' height='600px' src='data:application/pdf;base64, " + encodeURI(encodedPDF)+"'></iframe>";
        document.getElementById('1').innerHTML=PDFdisplay;

</script>
@endsection


