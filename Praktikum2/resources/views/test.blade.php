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
  toolbar: 'components | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media| button1',
  plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "emoticons template paste textcolor colorpicker textpattern",
       
      ],
      
  setup: (editor) => {
      editor.ui.registry.addButton('button1', {
        text: 'Yeet',
        onAction: function (_) {
          tinymce.activeEditor.dom.select('input');
          let compets = tinymce.activeEditor.dom.select('input.component');
          let label = [];
          for(let y =0;y<compets.length;y++){
             label.push(compets[y].attributes.name.value);
          }

      }
      });

      editor.ui.registry.addMenuButton('components', {
        text: 'Components',
        fetch: function (callback) {
          var menuItems =[
            {
              type: 'menuitem',
              text: 'Komponenta',
              onAction: function(_){
                let compets = tinymce.activeEditor.dom.select('input.component');
                editor.insertContent("<input name='' data-label='FOO_label' id="+compets.length+" type='text' class='form-control component' style='width:15%;height:calc(0.59rem + 2px);padding:.375rem .75rem;font-size:.9rem;line-height:1.6;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;margin-left: .5rem;margin-right:.5rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out' placeholder='Enter your label...'>");
                let compets2 = tinymce.activeEditor.dom.select('input.component');
                console.log(compets2);
                for(let y =0;y<compets2.length;y++){
                  tinymce.activeEditor.dom.setAttrib(compets2[y], 'name', 'WEAREHERE');
                } 
              }
            }
          ];
          callback(menuItems);
        }
      });
      

    }
  };
 
    tinymce.init(editor_config);

    
</script> 
</head>
<body>
<form action="{{ route('formStore') }}" method="POST" type="hidden" name="_token" class="form-group" enctype="multipart/form-data">
{{ csrf_field() }}
    <div class="container">

      <textarea id="editor" style="height:30em;" name="formData"></textarea>
      <br>
      <button type="submit" class="btn btn-primary">Primary</button>
      <br><br>
      <div class="row">
          <ul class="list-group">
            <li class="list-group-item">Zgori lahk zberes komponento za dodat</li>
            <li class="list-group-item">En klik na komponento (textbox) shrani tist kar napises kot data-label</li>
            <li class="list-group-item">DVOJNI KLIK na textbox izbrise komponento. NE BRISI Z BACKSPACE-OM</li>
            <li class="list-group-item">Komponente majo svoj data-id da jih lakha js locim</li>
            <li class="list-group-item">F12-> Console izpisuje vn ka se dogaja ko klikas oz. dvojno-klikas</li>
          </ul>
    
    </div>
  </form>  

</body>
@endsection