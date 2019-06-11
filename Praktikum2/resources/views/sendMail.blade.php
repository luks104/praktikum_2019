@extends('layouts.mainLayout')

@section('content')
<head>
<script src={{URL::to('vendor/parsley/parsley.min.js')}}></script>
<script src={{URL::to('vendor/parsley/validators.js')}}></script>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.0.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<div class="container">

    <div class="row " style="margin-top:2em;">
        <div class="col s12 m10 offset-m1 l8 offset-l2 ">
            <div class="card-panel white hoverable">
                <div class="center-align">
                    
                </div>
                <div class="divider">
                  
                </div>
             
                <div>
                    <h4>Send an E-mail</h4>
                    <form action="{{route('sendMail', ['id' => $form->id])}}" method="post" class="m-t-15" enctype="multipart/form-data"  data-parsley-validate="">
                    {{csrf_field()}}
                    <input type="hidden" id="document" name="test" value="{{!! $document !!}}"/>
                       

                        Receiptant:
                        <br />
                        <input type="text" name="receiptant" data-parsley-test/>

                        Subject:
                        <br />
                        <input type="text" name="subject" data-parsley-required="true"/>
                        
                        Message:
                        <br />
                        <input type="text" name="message" data-parsley-required="true"/>
                        
             
                    <div class="row">
                        <div class="col l6 offset-l3 m8 offset-m2 s10 offset-s1">
                            <button type="submit" class="btn btn-large bgStill waves-effect waves-light" style="width:100%;">Send mail
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                       
                    </form>
                   
                </div>
                <div class="row right-align">
                      
                </div>
            </div>
        </div>
    </div>
</div>



@endsection