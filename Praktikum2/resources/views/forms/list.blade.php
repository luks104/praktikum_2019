@extends('layouts.mainLayout')

@section('content')
<div style="height:2em;">
                        
        </div>
<div class="row">
 <div class="col l2 m10 offset-m2 offset-l1 s10 offset-s1 animated fadeInLeft" style="">
        <form action="{{ route('formSearch') }}" method="POST" type="hidden" name="_token" class="form-group"  enctype="multipart/form-data">
                {{ csrf_field() }}
                                <div class="row">
                                  <div class="input-field col s12 m5 l12">
                                    <input id="icon_prefix2" type="text" id="autocomplete-input" class="autocomplete" name="searchInput" value="{{  $searchInputOld  }}">
                                    <label for="icon_prefix2">Search</label>
                                  </div>
                                  <div class="input-field col s12 m5 l12">
                                <select id="categorie" name="categorie">
                                        <option value="Vse" {{ ($categorieOld == 'Vse' ? "selected":"") }}>Vse</option>
                                        @foreach($categories as $categorie)                                     
                                                <option value="{{ $categorie->name }}" {{ ($categorieOld == $categorie->name ? "selected":"") }}>{{ $categorie->name }}</option>
                                        @endforeach
                                </select>
                                <label>Category</label>
                                  </div>
                                  
                                </div>
                                <div class="row">
                                        <div class="col l10 offset-l1 s8 offset-s2 m8 offset-m1">
                                                <button type="submit" class="waves-effect waves-light btn bgStill" style="width:100%">Send</button>
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
                                          <div class="card-panel hoverable valign-wrapper" style="padding:0.1em;margin:0.3em;margin-top:0.6em;" >
                                             <div class="col" style="border-right:1px solid #576071;">
                                                    <i class="material-icons" class="bgStill">insert_drive_file</i>
                                             </div> 
                                                                                      
                                            <div class="col  s11 m11 l11 left-align">
                                                  <h6 class="ff-poppins" style="letter-spacing:1.5px;padding:0;color:#576071;min-height:1.2em;"> {{$form->form_name}}</h6>
                                                  
                                            </div>
                                            <div class="col l2 right-align" >
                                                <span class="helper-text grey-text text-lighten-1" data-error="wrong" data-success="right">{{$form->categorie_name}}</span>
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
<script>
        $(document).ready(function(){
    $('input.autocomplete').autocomplete({
      data: {
        @foreach ($forms as $form)
         "{{ $form->form_name }}":null, 
        @endforeach
      },
    });
  });
</script>

@endsection
