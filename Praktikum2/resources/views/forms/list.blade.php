@extends('layouts.mainLayout')

@section('content')
<div style="height:2em;">
                        
        </div>
<div class="row">
 <div class="col l2 m10 offset-m2 offset-l1 s10 offset-s1 animated fadeInLeft" style="">
                <form>
                                <div class="row">
                                  <div class="input-field col s12 m5 l12">
                                    <input id="icon_prefix2" type="text" id="autocomplete-input" class="autocomplete">
                                    <label for="icon_prefix2">Search</label>
                                  </div>
                                  <div class="input-field col s12 m5 l12">
                                               
                                                <select>
                                                        <option value="" disabled selected>Category</option>
                                                        <option value="1">Option 1</option>
                                                        <option value="2">Option 2</option>
                                                        <option value="3">Option 3</option>
                                                </select>
                                                <label>Category</label>
                                  </div>
                                  
                                  <div class="input-field col l10 s10 m12" >
                                        <p class="col m2 l12 s3">
                                                <label >
                                                        <input type="checkbox" />
                                                        <span>Red</span>
                                                </label>
                                        </p>
                                        <p class="col m2 l12 s3">
                                                <label>
                                                        <input type="checkbox" checked="checked" />
                                                        <span>Yellow</span>
                                                </label>
                                        </p>
                                  </div>
                                </div>
                                <div class="row">
                                        <div class="col l10 offset-l1 s8 offset-s2 m8 offset-m1">
                                                <a class="waves-effect waves-light btn bgAnim" style="width:100%">Save</a>
                                        </div>
                                </div>

                                
                </form>     
 </div>
 <div class="col l9 m12 s12 left-align ">
                
                                @if(count ($forms) > 0 )
                                @foreach ($forms as $form) 
                                <div class="row animated fadeInUp left-align" style="margin:0;">
                                        <div class="col s12 m10 offset-m1 l10 ">
                                        <a href="/form/{{$form->id}}">
                                          <div class="card-panel hoverable valign-wrapper" style="padding:0.1em;margin:2px;" >
                                            <div class="col" style="border-right:1px solid #576071;">
                                                    <i class="material-icons">insert_drive_file</i>
                                            </div>
                                            
                                            <div class="col  s12 m12 l12 left-align">
                                                  <h6 class="ff-poppins" style="letter-spacing:1.5px;padding:0;margin;color:#576071;min-height:1.2em;"> {{$form->form_name}}</h6> 
                                            </div>
                                          </div>
                                        </a>
                                        </div>
                                </div>
                                @endforeach
                               
                                @else
                                <h6 class="ff-poppins center-align" style="letter-spacing:1.5px;padding:0;margin;color:#576071;min-height:1.2em;"> No templates found :C</h6> 
                                @endif
                        </div>    
</div>

</div>

@endsection
