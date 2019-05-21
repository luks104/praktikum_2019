@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="en">
  <head>
  <script src={{URL::to('vendor/tinymce/js/tinymce/tinymce.min.js')}}></script>
  <!--Za vsak slučaj, če bo kdaj rabo lahko namesto poti toti link vstavi not 
  "https://cloud.tinymce.com/5/tinymce.min.js?apiKey=u10v0g64egvz9bbbguv1pg14x0au3nus6yzv88vhiwbfwd8"-->

<script>
 var editor_config = {
  selector: 'textarea#editor',
  toolbar: 'komponente | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
  plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "emoticons template paste textcolor colorpicker textpattern",
       
      ],
      
  setup: (editor) => {
      editor.ui.registry.addButton('komponente', {
        text: 'Komponenta',
      tooltip: 'Insert Current Date',
      onAction: function (_) {
        editor.insertContent("<input readonly style='margin-left:5px;margin-right:5px;border-radius:2px;' placeholder='Enterlabel' data-label='nekiLabel'>");
      }
      });
    }
    
  };

    tinymce.init(editor_config);

    
  </script> 
  </head>
    <body>
    <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
            <form method="post" class="form-group">
                <textarea id="editor" style="height:30em;"></textarea>
                <button type="button" class="btn btn-primary">Primary</button>
            </form>
        
            </div>
            <div class="col-lg-2">


            </div>
    </div>
    
    
    </body>
    @endsection