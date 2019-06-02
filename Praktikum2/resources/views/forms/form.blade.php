@extends('layouts.mainLayout')

@section('content')

<div class='container'>
    <div>
        <h1>{{$form->form_name}}</h1>
         
    </div>

    <div id="1">
        {!! $form->form_data !!}
        <iframe width='100%' height='100%' src='' type="application/pdf"></iframe>
        <object data="" type="application/pdf" width="100%" height="100%"></object>
    </div>
 
   

    <a href="{{ route('formWizard', ['id' => $form->id]) }}" class="btn btn-primary">Izpolni obrazec {{$form->form_name}}</a>
    <a href="/form/{{$form->id}}/formToPDF" class="btn btn-primary">pretvori v PDF {{$form->form_name}}</a>
    <!--<a href="{{ route('formToDocx', ['id' => $form->id]) }}" class="btn btn-primary">Pretvori v word datoteko {{$form->form_name}}</a>-->
    

</div>




<script>
  var encodedPDF = {!! json_encode($encodedPDF) !!};
       
        var encodedPDF = {!! json_encode($encodedPDF) !!};
        //var PDFdisplay = "<iframe width='100%' height='100%' src='data:application/pdf;base64, " + encodeURI(encodedPDF)+"'></iframe>";
      
        var base64EncodedPDF = {!! json_encode($encodedPDF) !!}; 
        var decodedPdfContent = atob(base64EncodedPDF);
        var byteArray = new Uint8Array(decodedPdfContent.length)
        for(var i=0; i<decodedPdfContent.length; i++){
            byteArray[i] = decodedPdfContent.charCodeAt(i);
        }
        var blob = new Blob([byteArray.buffer], { type: 'application/pdf' });
        var _pdfurl = URL.createObjectURL(blob);
        //console.log(blob);
        //var PDFdisplay = "<iframe width='100%' height='100%' src='data:application/pdf;base64, " + encodeURI(encodedPDF)+"' type="application/pdf"></iframe>";
        document.querySelector("iframe").data = blob;

        //document.getElementById('1').innerHTML=PDFdisplay;

</script>
@endsection


