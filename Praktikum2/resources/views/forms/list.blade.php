@extends('layouts.mainLayout')

@section('content')
<div class='container'>
        <div>
            <h3 class="ff-poppins grey-text text-darken-3" style="text-transform:uppercase;">Templates</h3>
        </div>
        
        <div class="row">
                        @if(count ($forms) > 0 )
                        @foreach ($forms as $form) 
                        <div class="col s12 m3">
                                <ul class="collapsible">
                                        <li>
                                          <div class="collapsible-header"><i class="material-icons">filter_drama</i>{{$form->form_name}}</div>
                                          <div class="collapsible-body"><span><a href="/form/{{$form->id}}" class="btn">GREMO</a></span></div>
                                        </li>
                                </ul> 
                        </div>             
                        @endforeach
                        
                    @else
                        <p>Ni objavljenih obrazcev</p>
                    @endif
                        
            
        </div>
        
    </div>
@endsection

