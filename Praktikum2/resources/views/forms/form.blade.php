@extends('layouts.mainLayout')

@section('content')
    
<div class="container">

    <div class="row " style="margin-top:2em;">
        <div class="col s12 m10 offset-m1 l8 offset-l2 ">
            <div class="card-panel white hoverable">
                <div class="center-align">
                    <h5>{{$form->form_name}}</h5>
                </div>
                <div class="divider">
                  
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos culpa ad cum harum, asperiores corporis quis neque nisi sunt unde eveniet aliquid itaque dolorem laboriosam accusantium, eum quod dignissimos suscipit?</p>
                </div>
                <div class="divider"></div>
                <div id="displayPDF">

                </div>
                <div>
                    <h6>Requirements:</h6>
                    {!!$data!!} 
                </div>
                <div class="row right-align">
                        <a href="{{ route('formWizard', ['id' => $form->id]) }}" class="btn bgStill">Fill the form "{{$form->form_name}}"</a>
                </div>
            </div>
        </div>
    </div>
</div>
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
        document.getElementById('displayPDF').innerHTML=PDFdisplay;

</script>
@endsection


