@extends('layouts.mainLayout')

@section('content')

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
                    <form role="form" action="{{route('sendMail', ['id' => $form->id])}}" method="post" class="m-t-15" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" id="test" name="test" value="{{!! $document !!}}"/>
                       

                        Receiptant:
                        <br />
                        <input type="text" name="receiptant"/>

                        Subject:
                        <br />
                        <input type="text" name="subject" />
                        
                        Message:
                        <br />
                        <input type="text" name="message" />
                        
             
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