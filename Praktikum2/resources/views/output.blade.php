@extends('layouts.mainLayout')

@section('content')

<div class="container">
    <div style="height:5em;">


    </div>
    <div class="row ">
    <div class="col s10 offset-s1 m10 offset-m1 l8 offset-l2 ">
      <ul class="tabs">
        <li class="tab col s6 m6 l6"><a class="active"href="#test1">Export</a></li>
        <li class="tab col s6 m6 l6"><a  href="#test2">Email</a></li>
      </ul>
    <div id="test1" class="col s12 m12 l12 white z-depth-4">
        <div style="height:2em;">
        </div>
        <div class="row">
            
            <div class="col l10 offset-l1 m10 offset-m1 s10 offset-s1 center-align" style="margin-bottom:2em;">
                <form action="{{ route('formToDocx', ['id' => $form->id]) }}">
                    <input type="hidden" id="document" name="document" value="{{ $document }}" >
                        {{csrf_field()}}
                            <div class="col l8 m8 s10 offset-l2 offset-m2 offset-s1">
                                <button type="submit" class="btn waves-effect waves-light bgStill"  style="width:100%;">Export as a DOC file
                                        <i class="material-icons white-text left">description</i>
                                </button>
                            </div>
                    </form>
            </div>
            <div class="col l10 offset-l1 m10 offset-m1 s10 offset-s1 center-align" style="margin-bottom:2em;">
                    <form action="{{ route('formToPDF',['id' => $form->id]) }}">
                        <input type="hidden" id="document" name="document" value="{{ $document }}" >
                        {{csrf_field()}}
                            <div class="col l8 m8 s10 offset-l2 offset-m2 offset-s1">
                                <button type="submit" class="btn waves-effect waves-light bgStill"  style="width:100%;">Export as a PDF file
                                    <i class="material-icons white-text left">picture_as_pdf</i>
                                </button>
                            </div>
                        </form>
                </div>
            <div class="col l10 offset-l1 m10 offset-m1 s10 offset-s1 center-align" style="margin-bottom:2em;">
                    <form action="{{ route('formToOdf', ['id' => $form->id]) }}">
                            <input type="hidden" id="document" name="document" value="{{ $document }}" >
                                {{csrf_field()}}
                                    <div class="col l8 m8 s10 offset-l2 offset-m2 offset-s1">
                                        <button type="submit" class="btn waves-effect waves-light bgStill"  style="width:100%;">Export as a OOXML file
                                                <i class="material-icons white-text left">description</i>
                                        </button>
                                    </div>
                            </form>
                </div>
            
        </div>
    </div>
    <div id="test2" class="col s12 m12 l12 white z-depth-4" >
        <div class="row">
                <div style="height:2em;">
                    </div>
            <div class="col l10 offset-l1 center-align" style="margin-bottom:2em;">
                <form action="{{ route('sendOnMyMail',['id' => $form->id]) }}">
                    <input type="hidden" id="document" name="document" value="{{ $document }}" >
                            {{csrf_field()}}
                                <div class="col l8 m8 s10 offset-l2 offset-m2 offset-s1">
                                    <button type="submit" class="btn waves-effect waves-light bgStill" style="width:100%">Send to my mail address
                                            <i class="material-icons white-text left">email</i>
                                    </button>
                                </div>
                        </form>
            </div>
            <div class="col l10 offset-l1 center-align" style="margin-bottom:2em;">
                <form action="{{ route('viewMail', ['id' => $form->id]) }} ">
                    <input type="hidden" id="document" name="document" value="{{ $document }}" >
                    {{csrf_field()}}
                        <div class="col l8 m8 s10 offset-l2 offset-m2 offset-s1">
                            <button type="submit"  class="btn waves-effect waves-light bgStill"style="width:100%">Send as a mail to different mail address
                                    <i class="material-icons white-text left">email</i>
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    </div>
    
  </div>
        
</div>

@endsection