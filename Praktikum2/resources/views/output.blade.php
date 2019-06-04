@extends('layouts.mainLayout')

@section('content')



<div class='row'>
    <div class="col s1"></div>
    <div class="col s5">
    <h3>Form: {{$form->form_name}}</h3>
    <font color="black"><h4 font color="black">Form data:</h4></font>
    {!! $document !!}

       
    </div>

    <div class="col s5" id="1" style=" padding-top: 30px;">
        <div class="row animated fadeInUp left-align" style="margin:0;">
            <div class="col s12 m10 offset-m1 l10 ">
            <a href="/form/{{$form->id}}/wizard/formToPDF">
                <div class="card-panel hoverable valign-wrapper" style="padding:0.1em;margin:0.3em;margin-top:0.6em;" >
                    <div class="col" style="border-right:1px solid #576071;">
                        <i class="material-icons" class="bgStill" style="color:red">picture_as_pdf</i>
                    </div>                                            
                    <div class="col  s12 m12 l12 left-align">
                        <h6 class="ff-poppins" style="letter-spacing:1.5px;padding:0;color:#576071;min-height:1.2em;"> Export as a PDF file<span class="red-text">{{  $form->categorie_name  }}</span></h6>
                    </div>
                </div>
            </a>
            </div>
        </div>
    </div>
    <div class="col s5" id="1" style=" padding-top: 30px;">
        <div class="row animated fadeInUp left-align" style="margin:0;">
            <div class="col s12 m10 offset-m1 l10 ">
            <a href="">
                <div class="card-panel hoverable valign-wrapper" style="padding:0.1em;margin:0.3em;margin-top:0.6em;" >
                    <div class="col" style="border-right:1px solid #576071;">
                        <i class="material-icons" class="bgStill">description</i>
                    </div>                                            
                    <div class="col  s12 m12 l12 left-align">
                        <h6 class="ff-poppins" style="letter-spacing:1.5px;padding:0;color:#576071;min-height:1.2em;"> Export as a DOC file<span class="red-text">{{  $form->categorie_name  }}</span></h6>
                    </div>
                </div>
            </a>
            </div>
        </div>
    </div>

    <div class="col s1"></div>


</div>

@endsection