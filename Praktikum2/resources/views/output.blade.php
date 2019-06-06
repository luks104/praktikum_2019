@extends('layouts.mainLayout')

@section('content')

<div class="container">
    <div style="height:5em;">

    </div>
    <div class="row">
        <div class="card-panel col l8 offset-m1 offset-l2 s12 m10 z-depth-5" style="padding:0;background-color:#08aeea80">    
            <div class="white-text center-align" style="padding:2em;background-color:#08aeea;font-size:1.2em;">You have successfully completed the form.</div>
            <div class="white" style="height:0.1em;" ></div>
            <div style="margin-top:5em;margin-bottom:5em;">
                <div class="row" >
                    <div class="col l8 offset-l2">
                            <form action="{{ route('formToPDF',['id' => $form->id]) }}">
                            {{csrf_field()}}
                            <input type="hidden" id="test" name="test" value="{{ $document }}">
                                <button type="submit" class="btn waves-effect waves-light">Export as a PDF file
                                    <i class="material-icons red-text left">picture_as_pdf</i>
                                </button>
                            </form>
                            
                    </div>
                </div>
                <div class="row ">
                    <div class="col l8 offset-l2">
                        <form action="{{ route('formToDocx', ['id' => $form->id]) }}">
                            {{csrf_field()}}
                            <input type="hidden" id="test" name="test" value="{{ $document }}">
                                
                            <button type="submit" class="btn waves-effect waves-light">Export as a DOC file
                                    <i class="material-icons blue-text left">description</i>
                            </button>
                        </form>
                    </div>
                </div>
    

                <div class="row ">
                    <div class="col l8 offset-l2">
                    <form action="{{ route('sendOnMyMail',['id' => $form->id]) }}">
                            {{csrf_field()}}
                            <input type="hidden" id="test" name="test" value="{{ $document }}">
                                
                            <button type="submit" class="btn waves-effect waves-light">Send to my mail address
                                    <i class="material-icons blue-text left">email</i>
                            </button>
                        </form>
                    
                    </div>
                </div>

                <div class="row ">
                    <div class="col l8 offset-l2">
                    <a href="{{ route('viewMail', ['id' => $form->id]) }} ">
                            <button class="btn waves-effect waves-light">Send as a mail to different mail address
                                    <i class="material-icons orange-text left">email</i>
                            </button>
                    </a>
                    </div>
                </div>
<!--

                    <div class="row ">
                            <div class="col l8 offset-l2">
                                    <a href="/form/{{$form->id}}/wizard/formToPDF">
                                    <div class="card-panel hoverable valign-wrapper animated bounceInRight" style="padding:0.1em;margin:0.3em;margin-top:0.6em;" >
                                            <div class="col" style="border-right:1px solid #576071;">
                                                <i class="material-icons green-text">mail</i>
                                            </div>                                            
                                            <div class="col  s12 m12 l12 left-align">
                                                <h6 class="ff-poppins" style="letter-spacing:1.5px;padding:0;color:#576071;min-height:1.2em;"> Send the form as mail</h6>
                                            </div>
                                    </div>
                                </a>
                            </div>
                        </div>-->
            </div>
        </div>
       
    </div>
        
</div>

@endsection