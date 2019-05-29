@extends('layouts.mainLayout')

@section('content')
<div class='container'>
        <div style="height:2em;">

        </div>
        @if(count ($forms) > 0 )
        @foreach ($forms as $form) 
        <div class="row animated fadeInUp" style="margin:0;">
                <div class="col s10 m10 l10 offset-l1 offset-m1 offset-s1">
                  <div class="card-panel hoverable valign-wrapper" style="padding:0.1em;margin:2px;" >
                    <div class="col" style="border-right:1px solid #576071;">
                            <i class="material-icons">insert_drive_file</i>
                    </div>
                    <div class="col  s11 m11 l11 left-align">
                          <h6 class="ff-poppins truncate" style="letter-spacing:1.5px;padding:0;margin;color:#576071;min-height:1.2em;"> {{$form->form_name}}</h6> 
                    </div>
                    <div class="col valign-wrapper">
                            <a href="/form/{{$form->id}}"><i class="material-icons hvr-forward tooltipped" data-position="left" data-tooltip="Open template" style="color:#576071">more_vert</i></a>
                    </div>
                  </div>
                </div>
        </div>
        @endforeach
        @else
        <h6 class="ff-poppins truncate" style="letter-spacing:1.5px;padding:0;margin;color:#576071;min-height:1.2em;"> No templates found :C</h6> 
        @endif
    </div>
@endsection
