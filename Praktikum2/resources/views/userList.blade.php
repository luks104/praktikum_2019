@extends('layouts.mainLayout')

@section('content')
<div class='container'>
        <div>
            <h3 class="ff-poppins grey-text text-darken-3" style="text-transform:uppercase;">Templates</h3>
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
                            <a href="{{ route('userFormEdit', ['id' => $form->id]) }}"><i class="material-icons hvr-grow-rotate tooltipped" data-position="left" data-tooltip="Edit template" style="color:#ffde00">edit</i></a>
                    </div>
                    <div class="col valign-wrapper">
                            <a href="#modal2" class="modal-trigger"><i class="material-icons hvr-buzz-out tooltipped" data-position="right" data-tooltip="Delete template" style="color:#e52929">delete</i></a>
                    </div>
                  </div>
                </div>
        </div>

        <div class="modal col l12 s12 m12" id="modal2" tabindex="-1" role="dialog" >
                <div class="modal-content">
                      <div class="row">
                              <h4 class="center-align">Confirmation</h4>
                        <div class="col l10 offset-l1 m10 offset-m1 s10 offset-s1">
                          <a href="{{ route('userFormDelete', ['id' => $form->id]) }}" class="modal-close btn-large waves-effect waves-light red darken-2 animated fadeIn delay-0.5s" style="width:100%" >Delete template</a>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col l10 offset-l1 m10 offset-m1 s10 offset-s1">
                          <button type="button" class="modal-close btn waves-effect waves-light darken-2 animated fadeIn delay-0.5s" style="background-color:#a4a5a8;width:100%" >Cancel</button>
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