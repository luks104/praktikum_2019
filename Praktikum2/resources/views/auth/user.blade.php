@extends('layouts.mainLayout')

@section('content')

<div class="container">
    <div style="height:5em;">

    </div>
    <div class="row">
        <div class="card-panel col l8 offset-m1 offset-l2 s12 m10 z-depth-5" style="padding:0;background-color:#08aeea80">    
            <div class="white-text center-align" style="padding:2em;background-color:#08aeea;font-size:1.8em;">My information</div>
            <div class="white" style="height:0.1em;" ></div>
            <div style="margin-top:5em;margin-bottom:5em;">
                <div class="row" >
                    <div class="col s10 m10 l10 offset-l1">
                            <div class="card-panel hoverable valign-wrapper animated bounceInRight" style="padding:0.1em;margin:0.3em;margin-top:0.6em;" >
                                    <div class="col s2 m2 l2 left-allign" style="margin:0;">
                                        <p>Username: </p>
                                    </div>                                            
                                    <div class="col  s6 m6 l6 left-align" style="margin-left:7%;">

                                        <form action="{{ route('usernameEdit') }}" method="POST" type="hidden" name="editUserName">{{ csrf_field() }}
                                            <input id="myTextbox1" name="username" type="text" value="{{ $user->name }}" class="ff-poppins" style="letter-spacing:1.5px;padding:0;color:#576071;min-height:1.0em;" required="true">
                                    </div>
                                    <div class="col">
                                        <button style="display:none;" id="submitButton" type="submit" class="bgStill btn" class="btn waves-effect waves-light"><i class="material-icons right">edit</i>Apply</button>
                                        </form>

                                    </div>
                            </div>
                    </div>
                </div>
                <div class="row ">
                        <div class="col s10 m10 l10 offset-l1">
                                <div class="card-panel hoverable valign-wrapper animated bounceInLeft" style="padding:0.1em;margin:0.3em;margin-top:0.6em;" >
                                      <div class="col s2 m2 l2 left-allign" style="margin:0;">
                                          <p>Email: </p>
                                      </div>                                            
                                     <div class="col  s6 m6 l6 left-align" style="margin-left:7%;">

                                        <form action="{{ route('emailEdit') }}" method="POST" type="hidden" name="editUserEmail">{{ csrf_field() }}
                                        <input id="myTextbox2" name="email" type="email" value="{{ $user->email }}" class="ff-poppins" style="letter-spacing:1.5px;padding:0;color:#576071;min-height:1.0em;" required="true">
                                     </div>
                                     <div class="col">
                                        <button style="display:none;" id="submitButton2" type="submit" class="bgStill btn" class="btn waves-effect waves-light"><i class="material-icons right">edit</i>Apply</button>
                                        </form>

                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="row ">
                            <div class="col s10 m10 l10 offset-l1">
                                <div class="card-panel hoverable valign-wrapper animated bounceInRight" style="padding:0.1em;margin:0.3em;margin-top:0.6em;" >
                                        <div class="col s2 m2 l2 left-allign" style="margin:0;">
                                            <p>New password: </p>
                                        </div>
                                        <div class="col  s6 m6 l6 left-align" style="margin-left:7%;">

                                            <form action="{{ route('passwordEdit') }}" method="POST" type="hidden" name="editUserPassword">{{ csrf_field() }}
                                            <input id="password" name="password" type="password" placeholder="New Password" class="validate @error('password') is-invalid @enderror ff-poppins" style="letter-spacing:1.5px;padding:0;color:#576071;min-height:1.0em;" required autocomplete="new-password">
                                                @error('password')
                                                <span class="helper-text text-red">{{$message}}</span>
                                                @enderror
                                        </div>
                                        <div class="col">
                                        </div>
                                </div>
                        </div>
                    </div>
                    <div class="row ">
                            <div class="col s10 m10 l10 offset-l1">
                                <div class="card-panel hoverable valign-wrapper animated bounceInRight" style="padding:0.1em;margin:0.3em;margin-top:0.6em;" >
                                        <div class="col s2 m2 l2 left-allign" style="margin:0;">
                                            <p>Confirm: </p>
                                        </div>
                                        <div class="col  s6 m6 l6 left-align" style="margin-left:7%;">

                                            <input id="passwordConfirm" name="password_confirmation" type="password" placeholder="Confirm Password" class="validate @error('password') is-invalid @enderror ff-poppins" style="letter-spacing:1.5px;padding:0;color:#576071;min-height:1.0em;" required autocomplete="new-password">                                               
                                        </div>
                                        <div class="col">
                                            <button style="display:none;" id="submitButton3" type="submit" class="bgStill btn" class="btn waves-effect waves-light"><i class="material-icons right">edit</i>Apply</button>
                                            </form>

                                        </div>
                                </div>
                        </div>
                    </div>
            </div>
        </div>
       
    </div>
        
</div>

<script>

$(document).ready(function(){
    $('#submitButton').fadeOut();

    $('#myTextbox1').keyup(function(){
        if($(this).val().length !=0){
            $("#submitButton").fadeIn();
        }
        else
        {
            $("#submitButton").fadeOut();        
        }
    })
});

$(document).ready(function(){
    $('#submitButton2').fadeOut();

    $('#myTextbox2').keyup(function(){
        if($(this).val().length !=0){
            $("#submitButton2").fadeIn();
        }
        else
        {
            $("#submitButton2").fadeOut();        
        }
    })
});

$(document).ready(function(){
    $('#submitButton3').fadeOut();

    $('#password').keyup(function(){
        if($(this).val().length !=0){
            $("#submitButton3").fadeIn();
        }
        else
        {
            $("#submitButton3").fadeOut();        
        }
    })
});

</script>

@endsection