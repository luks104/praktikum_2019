@extends('layouts.mainLayout')

@section('content')
    
<div class="container">
    <div style="height:2em;">

    </div>
    <div class="row">
        <div class="col l5 m10 offset-m1 s12">
            <div class="row">
                <div class="col l12 s12 ">
                  <div class="card-panel white z-depth-5 animated fadeInLeft" style="min-height:15em;">
                      <div class="myGrey ff-poppins center-align" style="font-size:2em;">
                            {{$form->form_name}}
                      </div>
                      <div class="divider" style="margin-bottom:1em;">

                      </div>
                    <p class="myGrey">{{$form->form_description}}
                    </p>
                    
                    <div class="row " style="margin-top:2em;">
                            <div class="col l12 m8 s6 offset-m2 offset-s3">
                                <a href="{{ route('formWizard', ['id' => $form->id]) }}" class="btn bgStill btn-large " style="width:100%">Fill the form "{{$form->form_name}}"</a>                    
                            </div>
                        </div>  
                  </div>
                </div>
              
                <div class="col l12 m10 offset-m1 s12">
                  <div class="card-panel white z-depth-5 animated fadeInUp" >
                      <div class="myGrey ff-poppins center-align" style="font-size:1.3em;">
                            Requirements
                      </div>
                      
                      <div class="divider" style="margin-bottom:1em;">
                            
                      </div>
                      
                      <div class="row">
                            @foreach($data as $item)
                          <div class="col l6 s6 m6">
                                <div class="card-panel blue lighten-4" style="padding:0.5em;border:1px solid #08aeea66;width:100%">
                                        <div class="myGrey ff-opensans center-align" style="font-weight:bold;">
                                                {{$item}}
                                          </div>
                                </div>
                          </div>
                          @endforeach
                      </div>
                  </div>
                </div>
            </div>
            
        </div>

        <div class="col l7 m10 offset-m1 s12 fadeInRight animated">
            <div class="card-panel white z-depth-5">
                    <div id="displayPDF"></div>
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


